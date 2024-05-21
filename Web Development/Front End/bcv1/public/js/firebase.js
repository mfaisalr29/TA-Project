// resources/js/firebase.js
import { initializeApp } from "firebase/app";
import { getDatabase, ref, set, get, child, onValue } from "firebase/database";

const firebaseConfig = {
    apiKey: process.env.MIX_FIREBASE_API_KEY,
    authDomain: process.env.MIX_FIREBASE_AUTH_DOMAIN,
    databaseURL: process.env.MIX_FIREBASE_DATABASE_URL,
    projectId: process.env.MIX_FIREBASE_PROJECT_ID,
    storageBucket: process.env.MIX_FIREBASE_STORAGE_BUCKET,
    messagingSenderId: process.env.MIX_FIREBASE_MESSAGING_SENDER_ID,
    appId: process.env.MIX_FIREBASE_APP_ID,
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const database = getDatabase(app);

export { database, ref, set, get, child, onValue };
