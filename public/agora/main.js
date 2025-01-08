const APP_ID = "2bb5a78066e44dc590d693b2f1b3f7ea"
const TOKEN = "007eJxTYNCe/nT6dc8X/hwpJgHG4gYistbT9DaXLL9ftP1bj5ZDnpkCg1FSkmmiuYWBmVmqiUlKsqmlQYqZpXGSUZphknGaeWpiyO3a9IZARgb+7E/MjAwQCOYzlGamJOYlp+oWVxaXpOYaMTAAABQ0Id4="
const CHANNEL = "guidance-system2"

const client = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp8' })

let localTracks = []
let remoteUsers = {}

const notepad = document.getElementById('notepad');
const notepadHeader = document.getElementById('notepad-header');
const notepadContent = document.getElementById('notepad-content');
const resizeHandle = document.getElementById('resize-handle');
const minimizeBtn = document.getElementById('minimize-btn');
const joinBtn = document.getElementById('join-btn');
const leaveBtn = document.getElementById('leave-btn');

let startTime = null;
let isDragging = false;
let isResizing = false;
let isMinimized = false;
let currentX;
let currentY;
let initialX;
let initialY;
let xOffset = 20;
let yOffset = 20;

let joinAndDisplayLocalStream = async () => {
    client.on('user-published', handleUserJoined);
    client.on('user-left', handleUserLeft);

    try {
        let UID = await client.join(APP_ID, CHANNEL, TOKEN, null);
        localTracks = await AgoraRTC.createMicrophoneAndCameraTracks();

        let player = `<div class="video-container" id="user-container-${UID}">
                          <div class="video-player" id="user-${UID}"></div>
                      </div>`;
        document.getElementById('video-streams').insertAdjacentHTML('beforeend', player);

        localTracks[1].play(`user-${UID}`);
        await client.publish([localTracks[0], localTracks[1]]);
    } catch (error) {
        console.error("Error joining or publishing:", error);
    }

    console.log('test12345', userId);

};


let joinStream = async () => {
    try {
        // Explicitly request camera and microphone access before joining
        await navigator.mediaDevices.getUserMedia({ video: true, audio: true });

        // Join Agora stream once permissions are granted
        await joinAndDisplayLocalStream();

        document.getElementById('join-btn').style.display = 'none';
        document.getElementById('stream-controls').style.display = 'flex';
        console.log('test123', counselingId);
    } catch (err) {
        console.error('Permission denied or error with media devices:', err);
        alert('Please allow camera and microphone access.');
    }
};

let handleUserJoined = async (user, mediaType) => {
    remoteUsers[user.uid] = user
    await client.subscribe(user, mediaType)

    if (mediaType === 'video') {
        let player = document.getElementById(`user-container-${user.uid}`)
        if (player != null) {
            player.remove()
        }

        player = `<div class="video-container" id="user-container-${user.uid}">
                        <div class="video-player" id="user-${user.uid}"></div>
                 </div>`
        document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)

        user.videoTrack.play(`user-${user.uid}`)
    }

    if (mediaType === 'audio') {
        user.audioTrack.play()
    }
}

let handleUserLeft = async (user) => {
    delete remoteUsers[user.uid]
    document.getElementById(`user-container-${user.uid}`).remove()
}

let leaveAndRemoveLocalStream = async () => {
    for (let i = 0; localTracks.length > i; i++) {
        localTracks[i].stop()
        localTracks[i].close()
    }

    await client.leave()
    document.getElementById('join-btn').style.display = 'block'
    document.getElementById('stream-controls').style.display = 'none'
    document.getElementById('video-streams').innerHTML = ''

    const endTime = new Date();
    const duration = Math.floor((endTime - startTime) / 1000); // Duration in seconds


    try {
        const response = await fetch('/video-call/notes', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                notes: notepadContent.value,
                duration: duration,
                user_id: userId,
                counseling_id: counselingId,
            })
        });

        if (!response.ok) {
            throw new Error('Failed to save notes');
        }

        console.log('test123456', response)

        // Reset notepad
        notepad.style.display = 'none';
        notepadContent.value = '';

        window.location.href = '/admin/counseling/approved';

    } catch (error) {
        console.error('Error saving notes:', error);
    }
}

let toggleMic = async (e) => {
    if (localTracks[0].muted) {
        await localTracks[0].setMuted(false)
        e.target.innerText = 'Mic on'
        e.target.style.backgroundColor = 'cadetblue'
    } else {
        await localTracks[0].setMuted(true)
        e.target.innerText = 'Mic off'
        e.target.style.backgroundColor = '#EE4B2B'
    }
}

let toggleCamera = async (e) => {
    if (localTracks[1].muted) {
        await localTracks[1].setMuted(false)
        e.target.innerText = 'Camera on'
        e.target.style.backgroundColor = 'cadetblue'
    } else {
        await localTracks[1].setMuted(true)
        e.target.innerText = 'Camera off'
        e.target.style.backgroundColor = '#EE4B2B'
    }
}

document.getElementById('join-btn').addEventListener('click', joinStream)
document.getElementById('leave-btn').addEventListener('click', leaveAndRemoveLocalStream)
document.getElementById('mic-btn').addEventListener('click', toggleMic)
document.getElementById('camera-btn').addEventListener('click', toggleCamera)


document.addEventListener('DOMContentLoaded', function () {

    // Show notepad when joining the stream
    joinBtn.addEventListener('click', () => {
        setTimeout(() => {
            notepad.style.display = 'block';
            setPosition(20, 20); // Initial position
        }, 2000)
        startTime = new Date();
    });

    // Dragging functionality
    notepadHeader.addEventListener('mousedown', dragStart);
    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', dragEnd);

    function dragStart(e) {
        initialX = e.clientX - xOffset;
        initialY = e.clientY - yOffset;

        if (e.target === notepadHeader) {
            isDragging = true;
        }
    }

    function drag(e) {
        if (isDragging) {
            e.preventDefault();
            currentX = e.clientX - initialX;
            currentY = e.clientY - initialY;
            xOffset = currentX;
            yOffset = currentY;
            setPosition(currentX, currentY);
        } else if (isResizing) {
            e.preventDefault();
            const width = e.clientX - notepad.offsetLeft;
            const height = e.clientY - notepad.offsetTop;
            notepad.style.width = Math.max(300, width) + 'px';
            notepad.style.height = Math.max(400, height) + 'px';
        }
    }

    function dragEnd() {
        initialX = currentX;
        initialY = currentY;
        isDragging = false;
        isResizing = false;
    }

    function setPosition(x, y) {
        notepad.style.transform = `translate(${x}px, ${y}px)`;
    }

    // Resizing functionality
    resizeHandle.addEventListener('mousedown', (e) => {
        isResizing = true;
        e.stopPropagation();
    });

    // Minimize/Maximize functionality
    minimizeBtn.addEventListener('click', () => {
        if (isMinimized) {
            notepad.style.height = '400px';
            notepadContent.style.display = 'block';
            minimizeBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 9l-7 7-7-7"/>
                </svg>
            `;
        } else {
            notepad.style.height = 'auto';
            notepadContent.style.display = 'none';
            minimizeBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 15l7-7 7 7"/>
                </svg>
            `;
        }
        isMinimized = !isMinimized;
    });

    // Save notes when leaving
    leaveBtn.addEventListener('click', async () => {
        console.log('test123');

    });
});
