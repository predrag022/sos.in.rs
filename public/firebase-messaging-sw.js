importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');


// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyCDgPLq3W9lFwoeCU8Eob99KdUnZy4N_s4",
    authDomain: "volonteri2020.firebaseapp.com",
    databaseURL: "https://volonteri2020.firebaseio.com",
    projectId: "volonteri2020",
    storageBucket: "volonteri2020.appspot.com",
    messagingSenderId: "640191933175",
    appId: "1:640191933175:web:0421842f019e72921381f2"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);


const messaging = firebase.messaging();
