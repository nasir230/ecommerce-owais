import React from 'react';
import ReactDOM from 'react-dom';
import io from 'socket.io-client';
// import UserChat from './Screens/UserChat';
// import AdminChat from './Screens/AdminChat';

// const Socket = io('https://owaisazamtechnical.herokuapp.com');
//  Socket.on('message',(msg) => {
//             console.log(msg);
            
//         });


// if (document.getElementById('react-chat-client')) {
//     const id = document.getElementById('react-chat-client');
//     ReactDOM.render(<UserChat url={id.getAttribute('data-url')}  name={id.getAttribute('data-name')} img={id.getAttribute('data-img')} id={id.getAttribute('data-id')} />, document.getElementById('react-chat-client'));
// }


// if (document.getElementById('react-chat-admin')) {
//     const id = document.getElementById('react-chat-admin');
//     ReactDOM.render(<AdminChat url={id.getAttribute('data-url')}  name={id.getAttribute('data-name')} img={id.getAttribute('data-img')}  />, document.getElementById('react-chat-admin'));
// }