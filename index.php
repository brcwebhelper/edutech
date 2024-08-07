<!-- <?php
$username = $_SESSION['username'];
?> -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Header with Smooth Edges and Animation</title>
    <style>
        /* Second part styles */
        .second-container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            /* Stack items vertically */
            align-items: center;
            /* Center items horizontally */
            justify-content: center;
            /* Center items vertically */
            background-image: url("bgback.png");
            /* Replace with your actual background image path */
            background-size: cover;
            overflow: hidden;
            animation: slideIn 1s ease-out;
        }

        .left-door,
        .right-door {
            width: 50%;
            height: 100%;
            position: absolute;
            top: 0;
            transition: transform 0.5s ease;
        }

        .left-door {
            left: 0;
            background: url("Leftdoor.png") no-repeat center;
            background-size: cover;
        }

        .right-door {
            right: 0;
            background: url("Rightdoor2.png") no-repeat center;
            background-size: cover;
        }

        #openButton {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            width: 50px;
            /* Adjust button size */
            height: 50px;
            /* Adjust button size */
            padding: 0;
            border-radius: 50%;
            background-color: #cccccc;
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        #openButton:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2), 0 0 20px rgba(255, 255, 255, 0.5);
            /* Add a shine effect */
        }

        #openButton:active {
            transform: translateY(-50%) scale(1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }


        .courses-container {
            display: none;
            /* Initially hide course container */
            align-items: center;
            justify-content: center;
            margin-top: 80px;
            /* Adjust spacing */
            position: relative;
            width: 100%;
            height: 100vh;
            /* Adjust height as needed */
        }

        .courses-container.show {
            display: flex;
            /* Show course container when doors are open */
        }

        .course-card {
            width: 300px;
            /* Adjust card width */
            height: 400px;
            /* Adjust card height */
            margin: 0 10px;
            /* Adjust spacing between cards */
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            opacity: 0;
            transition: opacity 1s ease-in-out, transform 0.5s ease-in-out, box-shadow 0.3s ease-in-out;
            /* Added transition for transform and box-shadow */
            cursor: pointer;
            position: absolute;

        }

        /* Added styles for the "Buy Now" button */
        .course-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 0 20px rgba(255, 255, 255, 1);
            /* Glow effect on hover */
            transform: scale(7);
            /* Scale up on hover */
        }

        .course-card .buy-now-btn {
            position: absolute;
            bottom: 20px;
            left: 75%;
            transform: translateX(-50%);
            background-color: #9d4caf;
            color: white;
            padding: 5px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 2s;
        }

        .course-card .buy-now-btn:hover {
            background-color: #753174;
        }

        .course-card.show {
            opacity: 1;
            /* Fade in the visible course card */
            display: block;
            /* Ensure the card is displayed */
        }

        .course-card.hide {
            opacity: 0;
            /* Fade out the hidden course card */
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-image {
            width: 100%;
            height: 60%;
            background-size: cover;
            background-position: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .course-info {
            padding: 40px;
        }

        .course-name {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #000;
            font-family: 'Times New Roman', Times, serif;
        }

        .course-cost {
            font-size: 16px;
            color: #666666;
        }

        .course-card.show {
            opacity: 1;
            z-index: 2;
        }

        .arrow-container {
            display: none;
            /* Initially hide arrow container */
            position: absolute;
            top: 50%;
            left: 30%;
            width: 40%;
            transform: translateY(-50%);
        }

        .arrow-container.show {
            display: flex;
            /* Show arrow container when doors are open */
            justify-content: space-between;
        }

        .arrow {
            width: 60px;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            color: #ffffff;
            font-size: 24px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .arrow:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .buy-now {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buy-now:hover {
            background-color: #ff4500;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .question-mark {
            user-select: none;
            /* Make the question mark non-selectable */
        }


        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            z-index: -1;
        }

        #content {
            position: relative;
            z-index: 1;
            color: white;
            padding: 20px;
        }

        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ffffff00;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header-container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 15px;
            padding: 10px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            animation: slideDown 1s ease-out;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            margin-left: 20px;
        }

        .logo img {
            width: 100px;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: #000000;
            text-decoration: none;
            margin: 0 15px;
            padding: 10px 5px;
            /* Base padding for buttons */
            position: relative;
            transition: padding 0.3s ease;
            /* Smooth transition for padding */
            border-radius: 20px;
            /* Rounded edges */
        }

        nav a:hover {
            color: #ffff00;
            /* Change text color to yellow on hover */
            background-color: #130624;
            /* Change background color to black on hover */
            padding: 10px 25px;
            /* Increase padding for buttons on hover */
        }





        nav a::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        nav a:hover::before {
            width: 100%;
            left: 0;
        }

        nav a:hover {
            color: #ff0;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* Align items to the top */
            width: 90%;
            max-width: 1200px;
            margin: 0px auto;
            animation: fadeIn 1.5s ease-in;
        }

        .text-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .text-container h1 {
            font-size: 4.5em;
            margin-bottom: 00px;

        }

        .buttons {
            display: flex;
            gap: 20px;

        }

        .buttons button {
            background-color: #ffffff;
            color: #000000;
            border: 2px solid #6e00a8;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .buttons button:hover {
            background-color: #ff0;
            color: #000;
        }

        .container {
            position: relative;
            animation: moveRobot 5s ease-in-out infinite;
        }

        .robot-image {
            width: 600px;
            /* Adjust the size as needed */
        }

        .question-mark {
            position: absolute;
            transform: translateX(-50%);
            font-size: 90px;
            color: #fff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(202, 0, 171, 0.3), 0 0 30px rgba(202, 0, 171, 0.3);
            animation: rotate 4s linear infinite, glow 1.5s ease-in-out infinite alternate, float 3s ease-in-out infinite;
            cursor: pointer;
            transition: transform 0.3s ease;
            /* Add transition for smooth flipping */
        }

        .question-mark.line-1 {
            top: 63px;
            left: 340px;
        }

        /*
/* Flip the question mark on hover */
        .question-mark:hover {
            transform: translateX(-50%) rotateY(180deg);
        }


        .smooth-transition {

            right: -100%;
            /* Start the element outside of the viewport */
            top: 50%;
            /* Adjust vertical position as needed */

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        .outer-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            max-width: 1400px;
            background-color: #f0f0f000;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .logos-container {
            position: relative;
            width: 45%;
            height: 400px;
            background-color: #00000000;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.9);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            perspective: 1000px;
        }

        .text-container {
            width: 50%;
            padding: 0px;
            text-align: left;
        }

        .text {
            font-size: 22px;
            color: #69026c;
        }

        .inner-container {
            position: absolute;
            width: 90px;
            height: 90px;
            background-color: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            transform-style: preserve-3d;
            transition: transform 0.3s ease;
        }

        .logo {
            width: 60px;
            height: 60px;
            margin: 10px;
            transition: transform 0.4s ease;
            /* Add smooth transition for logo scaling */
        }

        .logo:hover {
            transform: scale(1.2);
            /* Scale the image to 1.2 times its original size on hover */
        }



        /* Keyframes for rotation */
        @keyframes rotate {
            from {
                transform: translateX(-50%) rotate3d(0, 1, 0, 0deg);
            }

            to {
                transform: translateX(-50%) rotate3d(0, 1, 0, 360deg);
            }
        }

        /* Keyframes for glow */
        @keyframes glow {
            from {
                text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(202, 0, 171, 0.6), 0 0 30px rgba(202, 0, 171, 0.6);
            }

            to {
                text-shadow: 0 0 10px rgba(255, 255, 255, 1), 0 0 20px rgba(202, 0, 171, 0.6), 0 0 30px rgba(202, 0, 171, 0.6);
            }
        }

        /* Keyframes for floating */
        @keyframes float {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }


        @keyframes moveRobot {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(50px);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes spin {
            from {
                transform: translateX(-50%) rotate(0deg);
            }

            to {
                transform: translateX(-50%) rotate(360deg);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .question-mark {
            font-size: 64px;
            font-weight: bold;
            position: absolute;
            font-family: 'Roboto Mono', sans-serif;
        }

        #question-mark-container,
        #replacement-image {
            position: absolute;
            top: 40px;
            /* Adjust this value to position it where you want */
            left: 290px;
            /* Adjust this value to position it where you want */
        }

        .hidden {
            display: none;
        }

        .glow {
            animation: glow 2.5s infinite alternate;
        }

        @keyframes glow {
            from {
                filter: drop-shadow(0 0 10px rgba(221, 0, 255, 1));
            }

            to {
                filter: drop-shadow(0 0 20px rgba(221, 0, 255, 1));
            }
        }

        .question-mark:not(.glow) {
            filter: none;
        }

        @keyframes float {
            0% {
                transform: translate(-50%, -50%) translateY(-10px);
            }

            50% {
                transform: translate(-50%, -50%) translateY(10px);
            }

            100% {
                transform: translate(-50%, -50%) translateY(-10px);
            }
        }

        .floating {
            animation: float 3s infinite;
        }

        #replacement-image.glow.floating {
            animation: glow 1s infinite alternate, float 3s infinite;
        }

        /* chatbot start*/

        #floating-image {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 100px;
            background: url("chatbotrobo.png") no-repeat center center;
            background-size: cover;
            cursor: pointer;
            animation: glow 2s ease-in-out infinite alternate, floatUpDown 6s infinite alternate, floatLeftRight 25s forwards;
            z-index: 1000;
            filter: drop-shadow(0 0 10px pink) brightness(110%);
        }

        #floating-image:hover {
            animation-play-state: paused;
            filter: (110%);
            /* Increased glow on hover */
            transform: scale(1.1);
            /* Zoom effect on hover */
        }

        @keyframes floatUpDown {

            0%,
            100% {
                bottom: 0;
            }

            50% {
                bottom: 110px;
            }
        }

        @keyframes floatLeftRight {
            0% {
                left: 0;
            }

            50% {
                left: calc(100% - 100px);
            }

            100% {
                left: calc(100% - 100px);
                bottom: 20px;
            }
        }



        #background-zoom {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("galaxyndplanet.jpeg") repeat;
            background-size: cover;
            z-index: -1;
            /* Place the zoomed image behind the content */
            animation: zoomIn 5s ease forwards;
            opacity: 0;
            /* Initially hidden */
        }

        @keyframes zoomIn {
            from {
                transform: scale(1);
                opacity: 1;
                /* Initially fully opaque */
            }

            to {
                transform: scale(1.2);
                opacity: 0;
                /* Fade out at the end of animation */
            }
        }

        body {
            font-family: Arial, sans-serif;
        }

        #chat-container {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 350px;
            height: 500px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            background: linear-gradient(145deg, #1a1a2e, #16213e);
            color: #fff;
            z-index: 1000;
            flex-direction: column;
            animation: fadeIn 0.5s ease-in-out;
        }

        #chat-box {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        #chat-log {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            border-bottom: 1px solid #ccc;
            position: relative;
            z-index: 1;
            /* Ensure content is above the background image */
            background: url(Galaxyyyy.jpeg) repeat, linear-gradient(145deg, #1a1a2e, #16213e);
            background-size: cover;

            color: #fff;
            /* Ensure text is readable */
        }

        #chat-input {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ccc;
            background: #0f3460;
        }

        #user-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #0f3460;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            background: #1b262c;
        }

        #send-button {
            margin-left: 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        .hidden {
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        #need-help {
            position: fixed;
            bottom: calc(100% + 10px);
            /* Adjust this value as needed */
            right: calc(100% + 10px);
            /* Adjust this value as needed */
            background-color: #2a2a72;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1001;
            display: none;
        }

        #noButton:focus+#chat-container+#need-help {
            display: block;
        }


        #send-button {
            margin-left: 10px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #3282b8;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #send-button:hover {
            background-color: #0f4c75;
        }

        .user-message,
        .bot-message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            animation: fadeIn 0.5s ease-in-out;
            color: #fff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
            max-width: 80%;
            word-wrap: break-word;
            position: relative;
        }

        .user-message {
            align-self: flex-end;
            background: linear-gradient(145deg, #0f4c75, #3282b8);
            text-align: right;
        }

        .bot-message {
            align-self: flex-start;
            background: linear-gradient(145deg, #1b262c, #0f3460);
        }

        .user-message::after,
        .bot-message::after {
            content: '';
            display: block;
            position: absolute;
            background: inherit;
            filter: blur(20px);
            opacity: 0.7;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            border-radius: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* chatbot end*/
        .robot-image {
            box-shadow: #000;
        }


        /* Footer styles */
        footer {
            display: none;
            /* Hidden by default */
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(45deg, #0a0a23, #1a1a3d);
            padding: 20px 0;
            text-align: center;
            color: #fff;
            animation: slideUp 1.5s forwards, opacity 0.5s ease-out;

        }

        .footer-visible {
            display: block;
            transform: translateY(0);
            opacity: 1;
        }


        @keyframes slideUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-logo img {
            width: 80px;
            height: auto;
        }

        .footer-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-nav ul li {
            display: inline-block;
            margin: 0 15px;
        }

        .footer-nav ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-nav ul li a:hover {
            color: #ff4081;
        }

        .footer-contact p,
        .footer-address p {
            margin: 5px 0;
            font-size: 0.9em;

        }

        .footer-animation {
            position: relative;
            width: 200px;
            height: 100px;
        }

        .ufo,
        .spaceship {

            position: absolute;
            bottom: 0;
            width: 50px;
            height: auto;
            animation: float 4s infinite;

        }

        .ufo {
            left: 10%;
            animation-delay: 0s;


        }

        .spaceship {
            height: 100%;
            width: auto;
            animation: floatUpDown 5.5s infinite, floatLeftRight 35s infinite;

            position: absolute;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes floatUpDownUFO {

            0%,
            100% {
                transform: translateY(-20px);
                /* Increase the distance for UFO */
            }

            50% {
                transform: translateY(20px);
                /* Increase the distance for UFO */
            }
        }


        /* student*/

        .carousel123 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            max-width: 1400px;
            background-color: #ffffff00;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgb(255, 255, 255);
            margin-top: 1.85%;
            margin-bottom: 12.2%;
        }

        .carousel-container123 {
            position: relative;
            height: 500px;
            margin-top: 3.5%;
            width: 100%;
            overflow: hidden;
            /* Ensure overflow is hidden */
            display: flex;
            justify-content: center;
            align-items: center;
            right: 5%;


        }

        .container12 {
            width: 45%;
            height: 400px;
            background-color: #00000000;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.9);
            opacity: 0;
            transform: translateX(100%);
            transition: transform 1s ease-in-out, opacity 1s ease-in-out;
            position: absolute;
            /* Use absolute positioning to animate within the parent */
            background: url(skyhomebackground.html);
            animation-play-state: running;
        }

        .container12.active {
            opacity: 1;
            transform: translateX(0);
            z-index: 2;
            background: url(sky\ home\ background.html);
        }

        .container12.previous {
            opacity: 0;
            transform: translateX(-100%);
            z-index: 1;
            background: url(sky\ home\ background.html);
        }

        /* Zoom effect on hover */
        .container12 {
            /* Existing styles */
            cursor: pointer;
            /* Change cursor to pointer */
        }

        .container12.paused {
            /* Pause animation */
            animation-play-state: paused;
        }

        .container12 img {
            width: 100px;
            /* Adjust image width */
            height: auto;
            margin-top: 30px;
            /* Add some top margin to the image */
            border-radius: 100%;
            margin-left: 40%;
        }


        .student-info {
            margin-top: 30px;
            /* Add margin to the student info */
            margin-left: 40%;
        }

        .details {
            margin-top: 26px;
            margin-left: 40%;
        }

        .details h3 {
            margin: 0;
            font-size: 1.2em;

        }

        .details p {
            margin: 8px 0 0;
            color: #555;

        }

        .buttons12 {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);

        }

        .buttons12 button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
        }

        .buttons12 button:hover {
            background-color: rgba(0, 0, 0, 0.7);
            cursor: pointer;
        }


        /*footer ends*/
    </style>

</head>

<body class="home_body" tabIndex=0>

    <iframe id="background" src="skyhomebackground.html"></iframe>
    <section>
        <div class="header-container">
            <header>
                <div class="logo">
                    <img src="icon_prev_ui.png" alt="Company Logo" width="0px" height="60px">
                </div>
                <nav>
                    <a href="#home">Home</a>
                    <a href="#courses" id="courses-link">Courses</a>
                    <a href="about.html">About</a>
                    <a href="#login">LMS</a>
                    <a href="login.html">Signup/Login</a>
                </nav>
            </header>
        </div>

        <div class="content-container" style="text-align: left;">
            <div class="text-container">
                <p>
                <h1>Want help in career?</h1>
                </p>
                <p style="font-size: 25px; font-family: 'Times New Roman', Times, serif;">
                    We are dedicated to guiding India's future by helping individuals make the right career choices.
                    Let's explore how we can assist you in navigating your career path and what steps you can take
                    to ensure your professional success.
                </p>
                <p>
                <div class="buttons">
                    <button id="yes-button" style="font-weight: bold;">Yes</button>
                    <button id="signup-button" style="display: none;">Sign Up</button>
                    <button id="noButton" style="font-weight: bold;">No</button>
                    </p>
                </div>

            </div>

            <div class="container">
                <img src="mainrobo.png" alt="Futuristic Robot" class="robot-image" width="500px" height="550px">
                <div class="question-mark line-1">?</div>
                <div class="image-container hidden">
                    <img id="replacement-image" src="bulb.png" alt="Replacement Image"
                        style="width: 130px; height: 100px;">
                </div>
            </div>
    </section>
    <section>
        <div class="smooth-transition"> <!-- Add smooth-transition class to the outer container -->
            <div class="outer-container">
                <div class="logos-container">
                    <div class="stars"></div>

                    <div class="inner-container" style="left: 210px; top: 210px;">
                        <img src="icon (1).png" class="logo" id="logo1">
                    </div>
                    <div class="inner-container" style="left: 210px; top: 210px;">
                        <img src="icon (2).png" class="logo" id="logo2">

                    </div>
                    <div class="inner-container" style="left: 210px; top: 210px;">
                        <img src="icon (3).png" class="logo" id="logo3">
                    </div>
                    <div class="inner-container" style="left: 210px; top: 210px;">
                        <img src="icon (4).png" class="logo" id="logo4">
                    </div>
                    <div class="inner-container" style="left: 210px; top: 210px;">
                        <img src="icon (5).png" class="logo" id="logo5">
                    </div>
                    <div class="inner-container" style="left: 210px; top: 210px;">
                        <img src="icon (6).png" class="logo" id="logo6">
                    </div>
                </div>
                <div class="text-container">
                    <div class="text">
                        <h2>Do you want to Update your skills ?</h2>
                    </div>
                    <h3>We provide the best mentorship, guidance, and support to help you grow and excel in your domain.
                        Our dedicated team is committed to ensuring that you receive the personalized attention and
                        resources needed to thrive. With our comprehensive approach, we empower you to overcome
                        challenges, seize opportunities, and reach your fullest potential. Whether you're just starting
                        your journey or looking to advance in your field, our goal is to be your trusted partner every
                        step of the way.</h3>
                </div>

            </div>
            <!-- chatbot of the page -->







    </section>

    <!-- Second part of the page -->
    <div class="second-container" id="courses">
        <div class="left-door"></div>
        <div class="right-door"></div>
        <button id="openButton">O</button>

        <div class="courses-container">
            <!-- <div class="course-card show">
                <div class="course-image" style="background-image: url('Medical.jpeg');"></div>
                <div class="course-info">
                    <div class="course-name">Medical Coding</div>
                    <div class="course-cost">Price: ₹5000</div>
                </div>
                <button class="buy-now-btn">Enroll Now</button>
            </div>
            <div class="course-card">
                <div class="course-image" style="background-image: url('Andriod.jpeg');"></div>
                <div class="course-info">
                    <div class="course-name">Android Development</div>
                    <div class="course-cost">₹5000</div>
                </div>
                <button class="buy-now-btn">Enroll Now</button>
            </div>
            <div class="course-card">
                <div class="course-image" style="background-image: url('MLearning.jpeg');"></div>
                <div class="course-info">
                    <div class="course-name">Machine Learning</div>
                    <div class="course-cost">₹5000</div>
                </div>
                <button class="buy-now-btn">Enroll Now</button>
            </div>
            <div class="course-card">
                <div class="course-image" style="background-image: url('Artificial.jpeg');"></div>
                <div class="course-info">
                    <div class="course-name">Artificial Intelligence</div>
                    <div class="course-cost">₹5000</div>
                </div>
                <button class="buy-now-btn">Enroll Now</button>
            </div> -->
        </div>
        <div class="arrow-container">
            <button class="arrow arrow-left">&#10094;</button>
            <button class="arrow arrow-right">&#10095;</button>
        </div>
    </div>
    <div id="floating-image" title="Need any help?" onclick="toggleChat()"></div>
    <div id="chat-container" class="hidden">
        <div id="chat-box">
            <div id="chat-log"></div>
            <div id="chat-input">
                <input type="text" id="user-input" placeholder="Type your message here..." />
                <button id="send-button">Send</button>
            </div>
        </div>
    </div>
    <div id="popup" class="hidden">Need help?</div>
    <div class="carousel123" id="carousel123">
        <div class="buttons">

        </div>
        <div class="carousel-container123" id="carousel-container123">

            <div class="container12">
                <img src="galaxy.jpeg" alt="Company Logo">
                <div class="student-info">
                    <h3>John Doe</h3>
                    <p>Computer Science student</p>
                </div>
                <div class="details">
                    <h3>Project Title1</h3>
                    <p>Details about the project.</p>
                </div>
            </div>
            <div class="container12">
                <img src="Artificial.jpeg" alt="Company Logo">
                <div class="student-info">
                    <h3>Mohan</h3>
                    <p>Medical</p>
                </div>
                <div class="details">
                    <h3>Project Title2</h3>
                    <p>Details about the project.</p>
                </div>
            </div>
            <div class="container12">
                <img src="mainrobo.png" alt="Company Logo">
                <div class="student-info">
                    <h3>Microsoft</h3>
                    <p>Computer Science student</p>
                </div>
                <div class="details">
                    <h3>Project Title3</h3>
                    <p>Details about the project.</p>
                </div>
            </div>
            <div class="container12">
                <img src="Andriod.jpeg" alt="Company Logo">
                <div class="student-info">
                    <h3>John Doe</h3>
                    <p>Computer Science student</p>
                </div>
                <div class="details">
                    <h3>Project Title4</h3>
                    <p>Details about the project.</p>
                </div>
            </div>
            <div class="container12">
                <img src="Medical.jpeg" alt="Company Logo">
                <div class="student-info">
                    <h3>John Doe</h3>
                    <p>Computer Science student</p>
                </div>
                <div class="details">
                    <h3>Project Title5</h3>
                    <p>Details about the project.</p>
                </div>
            </div>
            <div class="container12">
                <img src="Leftdoor.png" alt="Company Logo">
                <div class="student-info">
                    <h3>John Doe</h3>
                    <p>Computer Science student</p>
                </div>
                <div class="details">
                    <h3>Project Title5</h3>
                    <p>Details about the project.</p>
                </div>
            </div>
            <div class="container12">
                <img src="Rightdoor2.png" alt="Company Logo">
                <div class="student-info">
                    <h3>John Doe</h3>
                    <p>Computer Science student</p>
                </div>
                <div class="details">
                    <h3>Project Title5</h3>
                    <p>Details about the project.</p>
                </div>
            </div>

            <!-- Repeat for other containers -->
            <!-- Add more containers here -->
        </div>
    </div>
    <!-- Footer Section -->
    <footer id="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="logo.png" alt="Company Logo">
                <img class="spaceship" src="spaceship3.png" alt="Spaceship">

            </div>
            <nav class="footer-nav">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#lms">LMS</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </nav>
            <div class="footer-contact">
                <p>Contact us:</p>
                <p>(123) 456-7890</p>
                <p>Email:</p>
                <p>info@spacetech.com</p>
            </div>
            <div class="footer-address">
                <p>Office Address:</p>
                <p>123 Space Avenue</p>
                <p>Galaxy City, GX12345</p>
            </div>
            <div class="footer-animation">
                <img class="ufo" src="UFO2.png" alt="UFO">


            </div>
        </div>
    </footer>
    <!-- <script type="module" src=""></script> -->
    <!-- <script>

        async function fetchAndDisplayCourses() {
            try {
                const response = await fetch('backend/fetch_courses.php');
                const data = await response.json();
                console.log("json" + data.length);
                const container = document.querySelector('.courses-container');
                data.forEach((course, index) => {
                    const courseCard = document.createElement('div');
                    courseCard.classList.add('course-card');
                    if (index === 0) {
                    courseCard.classList.add('show');
                    }
                    courseCard.innerHTML = `
                <div class="course-image" style="background-image: url('${course.image}');"></div>
                <div class="course-info">
                    <div class="course-name">${course.name}</div>
                    <div class="course-cost">Price: ${course.price}</div>
                </div>
                <button class="buy-now-btn">Enroll Now</button>
            `;
                    container.appendChild(courseCard);
                });
            } catch (error) {
                console.error('Error fetching courses:', error);
            }
        }


        // Call the function
        fetchAndDisplayCourses();


        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.querySelector('.smooth-transition').style.right = '0'; // Slide in from the right
            }, 500); // Delay the transition for 0.5 seconds
        });

        setInterval(() => {
            let currentTime = new Date();
            let seconds = parseFloat(currentTime.getSeconds()) + parseFloat(currentTime.getMilliseconds()) / 1100;
            let radians = (2 * Math.PI * seconds) / 35;
            let radius = 140;
            let containers = document.querySelectorAll('.inner-container');
            let angleIncrement = (2 * Math.PI) / containers.length;
            let center = { x: 0, y: -55 }; // Center of black container

            containers.forEach((container, index) => {
                let currentAngle = angleIncrement * index;
                let x = center.x + radius * Math.cos(radians + currentAngle);
                let y = center.y + radius * Math.sin(radians + currentAngle);
                container.style.transform = `translate(${x}px, ${y}px)`;
            });
        }, 10);

        document.getElementById("yes-button").addEventListener("click", function () {
            this.style.display = "none";  // Hide the "Yes" button
            document.getElementById("signup-button").style.display = "inline-block";  // Show the "Sign Up" button
            document.querySelector(".question-mark").classList.add("hidden");  // Hide the question mark
            document.querySelector(".image-container").classList.remove("hidden");  // Show the image container
            document.getElementById("replacement-image").classList.add("glow", "floating");   // Add both glow and floating effects to the image
        });


        document.getElementById("signup-button").addEventListener("click", function () {
            window.location.href = "login.html"; // Change "login.html" to your login page URL
        });
        function scrollToSecondPart() {
            const secondPart = document.getElementById("courses");
            secondPart.scrollIntoView({ behavior: "smooth" });




        }

        document.getElementById('openButton').addEventListener('click', function () {
            var leftDoor = document.querySelector('.left-door');
            var rightDoor = document.querySelector('.right-door');
            var coursesContainer = document.querySelector('.courses-container');
            var arrowContainer = document.querySelector('.arrow-container');

            // Get the computed transform style of the left door
            var leftDoorTransform = window.getComputedStyle(leftDoor).getPropertyValue('transform');

            // Check if the doors are already open
            if (leftDoorTransform === "matrix(1, 0, 0, 1, 0, 0)") {
                // If the doors are open, close them
                leftDoor.style.transform = "translateX(-100%)";
                rightDoor.style.transform = "translateX(100%)";
                coursesContainer.classList.add('show');
                arrowContainer.classList.add('show');
            } else {
                // If the doors are closed, open them
                leftDoor.style.transform = "translateX(0%)";
                rightDoor.style.transform = "translateX(0%)";
                coursesContainer.classList.remove('show');

                // Ensure the arrow container is explicitly shown

            }
        });



        var courseCards = document.querySelectorAll('.course-card');
        var currentIndex = 0;

        function showCourse(index) {
            // console.log(courseCards.length);
            for (var i = 0; i < courseCards.length; i++) {
                
                courseCards[i].classList.remove('show');
            }
            courseCards[index].classList.add('show');
        }

        document.querySelector('.arrow-left').addEventListener('click', function () {
            currentIndex = (currentIndex === 0) ? courseCards.length - 1 : currentIndex - 1;
            showCourse(currentIndex);
        });

        document.querySelector('.arrow-right').addEventListener('click', function () {
            currentIndex = (currentIndex === courseCards.length - 1) ? 0 : currentIndex + 1;
            showCourse(currentIndex);
        });
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.course-card');
            const totalSlides = data.length;
            console.log("slides " + totalSlides);
            let slideIndex = 0;
            let interval;

            const showSlide = (index) => {
                slides.forEach((slide, i) => {
                    if (i === index) {
                        slide.classList.remove('hide');
                        slide.classList.add('show');
                    } else {
                        slide.classList.remove('show');
                        slide.classList.add('hide');
                    }
                });
            };

            const nextSlide = () => {
                console.log("next slide");
                slideIndex = (slideIndex + 1) % totalSlides;
                showSlide(slideIndex);
            };

            const prevSlide = () => {
                console.log("prev slide");
                slideIndex = (slideIndex - 1 + totalSlides) % totalSlides;
                showSlide(slideIndex);
            };

            const startAutoSlide = () => {
                interval = setInterval(nextSlide, 1000); // Change slide every 3 seconds
            };

            const stopAutoSlide = () => {
                clearInterval(interval);
            };

            document.querySelector('.arrow-right').addEventListener('click', nextSlide);
            document.querySelector('.arrow-left').addEventListener('click', prevSlide);

            slides.forEach(slide => {
                slide.addEventListener('mouseenter', stopAutoSlide);
                slide.addEventListener('mouseleave', startAutoSlide);
            });

            // Initialize auto-slide
            startAutoSlide();

            // Show the first slide initially
            showSlide(slideIndex);
        });
        document.getElementById('courses-link').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default link behavior
            var target = document.getElementById('courses'); // Get the target element
            target.scrollIntoView({ behavior: 'smooth', block: 'start' }); // Scroll to the target element smoothly
        });
        // chatbot start
        function toggleChat() {
            const chatContainer = document.getElementById("chat-container");
            chatContainer.style.display = chatContainer.style.display === "none" || chatContainer.style.display === "" ? "flex" : "none";
        }

        document.addEventListener("click", (event) => {
            const chatContainer = document.getElementById("chat-container");
            const floatingImage = document.getElementById("floating-image");

            if (!chatContainer.contains(event.target) && event.target !== floatingImage) {
                chatContainer.style.display = "none";
            }
        });

        document.addEventListener("DOMContentLoaded", () => {
            const userInput = document.getElementById("user-input");
            const sendButton = document.getElementById("send-button");

            const predefinedResponses = {
                "hi": "Hello! How can I help you today?",
                "Hi": "Hello! How can I help you today?",
                "hello": "Hi there! What can I do for you?",
                "Hello": "Hi there! What can I do for you?",
                "Hlo": "Hi there! What can I do for you?",
                "hlo": "Hi there! What can I do for you?",
                "fuck": "Are you gay, Lets meet tonight!",
                "I am not gay": "Then What is your rate",
                "i am not gay": "Then What is your rate",
                "what courses do you offer?": "We offer courses in Data Science, AI, and Python programming.",
                "tell me about the data science course": "Our Data Science course covers Python, Machine Learning, and more.",
                "what does the ai course cover?": "The AI course includes topics on neural networks, deep learning, and computer vision.",
                "how do i enroll?": "You can enroll by visiting our enrollment page or contacting our support team.",
            };

            sendButton.addEventListener("click", () => {
                const message = userInput.value.trim().toLowerCase();
                if (message) {
                    appendMessage("user", message);
                    respondToMessage(message);
                    userInput.value = "";
                }
            });

            userInput.addEventListener("keypress", (event) => {
                if (event.key === "Enter") {
                    sendButton.click();
                }
            });

            function respondToMessage(message) {
                const response = predefinedResponses[message] || "Sorry, I don't understand that question.";
                setTimeout(() => {
                    appendMessage("bot", response);
                }, 1000);
            }

            function appendMessage(sender, message) {
                const chatLog = document.getElementById("chat-log");
                const messageElement = document.createElement("div");
                messageElement.className = `${sender}-message`;
                messageElement.textContent = message;
                chatLog.appendChild(messageElement);
                chatLog.scrollTop = chatLog.scrollHeight;
            }
        });
        // chatbot end
        // footer starts
        let lastScrollTop = 0;
        window.addEventListener('scroll', function () {
            let footer = document.querySelector('footer');
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            let windowHeight = window.innerHeight;
            let documentHeight = document.documentElement.scrollHeight;

            if (currentScroll + windowHeight >= documentHeight - 100) {
                // Near the end of the page
                footer.classList.add('footer-visible');
            } else if (currentScroll < lastScrollTop) {
                // Scrolling up slightly
                footer.classList.remove('footer-visible');
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For mobile or negative scrolling
        });




        // footer ends
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('noButton').addEventListener('click', function () {
                const chatContainer = document.getElementById('chat-container');
                const needHelp = document.getElementById('need-help');

                // Make the chat container visible
                chatContainer.classList.remove('hidden');
                chatContainer.style.display = 'flex';

                // Show the "Need help?" message
                needHelp.style.display = 'block';
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const containers = document.querySelectorAll('.carousel-container123 .container12');
            let currentIndex = 0;

            function showNextContainer() {
                const currentContainer = containers[currentIndex];
                currentContainer.classList.remove('active');
                currentContainer.classList.add('previous');

                currentIndex = (currentIndex + 1) % containers.length;
                const nextContainer = containers[currentIndex];
                nextContainer.classList.add('active');
                nextContainer.classList.remove('previous');
            }

            // Initialize the first container as active
            containers[currentIndex].classList.add('active');

            // Set an interval to show the next container every 3 seconds

            setInterval(showNextContainer, 3000);
        });






    </script> -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            async function fetchAndDisplayCourses() {
                try {
                    const response = await fetch('backend/fetch_courses.php');
                    const data = await response.json();
                    console.log("json", data.length);
                    const container = document.querySelector('.courses-container');
                    data.forEach((course, index) => {
                        const courseCard = document.createElement('div');
                        courseCard.classList.add('course-card');
                        if (index === 0) {
                            courseCard.classList.add('show');
                        }
                        courseCard.innerHTML = `
                    <div class="course-image" style="background-image: url('${course.image}');"></div>
                    <div class="course-info">
                        <div class="course-name">${course.name}</div>
                        <div class="course-cost">Price: ${course.price}</div>
                    </div>
                    <button class="buy-now-btn">Enroll Now</button>
                `;
                        container.appendChild(courseCard);
                    });

                    // Initialize courseCards after adding all course cards
                    var courseCards = document.querySelectorAll('.course-card');
                    var currentIndex = 0;

                    function showCourse(index) {
                        for (var i = 0; i < courseCards.length; i++) {
                            courseCards[i].classList.remove('show');
                        }
                        courseCards[index].classList.add('show');
                    }

                    document.querySelector('.arrow-left').addEventListener('click', function () {
                        currentIndex = (currentIndex === 0) ? courseCards.length - 1 : currentIndex - 1;
                        showCourse(currentIndex);
                    });

                    document.querySelector('.arrow-right').addEventListener('click', function () {
                        currentIndex = (currentIndex === courseCards.length - 1) ? 0 : currentIndex + 1;
                        showCourse(currentIndex);
                    });

                } catch (error) {
                    console.error('Error fetching courses:', error);
                }
            }

            // Call the function after DOM is fully loaded
            fetchAndDisplayCourses();

            window.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    document.querySelector('.smooth-transition').style.right = '0';
                }, 500);
            });

            setInterval(() => {
                let currentTime = new Date();
                let seconds = parseFloat(currentTime.getSeconds()) + parseFloat(currentTime.getMilliseconds()) / 1000;
                let radians = (2 * Math.PI * seconds) / 60;
                let radius = 140;
                let containers = document.querySelectorAll('.inner-container');
                let angleIncrement = (2 * Math.PI) / containers.length;
                let center = { x: 0, y: -55 };

                containers.forEach((container, index) => {
                    let currentAngle = angleIncrement * index;
                    let x = center.x + radius * Math.cos(radians + currentAngle);
                    let y = center.y + radius * Math.sin(radians + currentAngle);
                    container.style.transform = `translate(${x}px, ${y}px)`;
                });
            }, 10);

            document.getElementById("yes-button").addEventListener("click", function () {
                this.style.display = "none";
                document.getElementById("signup-button").style.display = "inline-block";
                document.querySelector(".question-mark").classList.add("hidden");
                document.querySelector(".image-container").classList.remove("hidden");
                document.getElementById("replacement-image").classList.add("glow", "floating");
            });

            document.getElementById("signup-button").addEventListener("click", function () {
                window.location.href = "login.html";
            });

            function scrollToSecondPart() {
                const secondPart = document.getElementById("courses");
                secondPart.scrollIntoView({ behavior: "smooth" });
            }

            document.getElementById('openButton').addEventListener('click', function () {
                var leftDoor = document.querySelector('.left-door');
                var rightDoor = document.querySelector('.right-door');
                var coursesContainer = document.querySelector('.courses-container');
                var arrowContainer = document.querySelector('.arrow-container');

                var leftDoorTransform = window.getComputedStyle(leftDoor).getPropertyValue('transform');

                if (leftDoorTransform === "matrix(1, 0, 0, 1, 0, 0)") {
                    leftDoor.style.transform = "translateX(-100%)";
                    rightDoor.style.transform = "translateX(100%)";
                    coursesContainer.classList.add('show');
                    arrowContainer.classList.add('show');
                } else {
                    leftDoor.style.transform = "translateX(0%)";
                    rightDoor.style.transform = "translateX(0%)";
                    coursesContainer.classList.remove('show');
                }
            });

            document.addEventListener('DOMContentLoaded', () => {
                const slides = document.querySelectorAll('.course-card');
                let slideIndex = 0;
                let interval;

                const showSlide = (index) => {
                    slides.forEach((slide, i) => {
                        slide.classList.toggle('show', i === index);
                        slide.classList.toggle('hide', i !== index);
                    });
                };

                const nextSlide = () => {
                    slideIndex = (slideIndex + 1) % slides.length;
                    showSlide(slideIndex);
                };

                const prevSlide = () => {
                    slideIndex = (slideIndex - 1 + slides.length) % slides.length;
                    showSlide(slideIndex);
                };

                const startAutoSlide = () => {
                    interval = setInterval(nextSlide, 3000);
                };

                const stopAutoSlide = () => {
                    clearInterval(interval);
                };

                document.querySelector('.arrow-right').addEventListener('click', nextSlide);
                document.querySelector('.arrow-left').addEventListener('click', prevSlide);

                slides.forEach(slide => {
                    slide.addEventListener('mouseenter', stopAutoSlide);
                    slide.addEventListener('mouseleave', startAutoSlide);
                });

                startAutoSlide();
                showSlide(slideIndex);
            });

            document.getElementById('courses-link').addEventListener('click', function (event) {
                event.preventDefault();
                var target = document.getElementById('courses');
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });

            // Chatbot
            function toggleChat() {
                const chatContainer = document.getElementById("chat-container");
                chatContainer.style.display = chatContainer.style.display === "none" || chatContainer.style.display === "" ? "flex" : "none";
            }

            document.addEventListener("click", (event) => {
                const chatContainer = document.getElementById("chat-container");
                const floatingImage = document.getElementById("floating-image");

                if (!chatContainer.contains(event.target) && event.target !== floatingImage) {
                    chatContainer.style.display = "none";
                }
            });

            document.addEventListener("DOMContentLoaded", () => {
                const userInput = document.getElementById("user-input");
                const sendButton = document.getElementById("send-button");

                const predefinedResponses = {
                    "hi": "Hello! How can I help you today?",
                    "hello": "Hi there! What can I do for you?",
                    "what courses do you offer?": "We offer courses in Data Science, AI, and Python programming.",
                    "tell me about the data science course": "Our Data Science course covers Python, Machine Learning, and more.",
                    "what does the ai course cover?": "The AI course includes topics on neural networks, deep learning, and computer vision.",
                    "how do i enroll?": "You can enroll by visiting our enrollment page or contacting our support team.",
                };

                sendButton.addEventListener("click", () => {
                    const message = userInput.value.trim().toLowerCase();
                    if (message) {
                        appendMessage("user", message);
                        respondToMessage(message);
                        userInput.value = "";
                    }
                });

                userInput.addEventListener("keypress", (event) => {
                    if (event.key === "Enter") {
                        sendButton.click();
                    }
                });

                function respondToMessage(message) {
                    const response = predefinedResponses[message] || "Sorry, I don't understand that question.";
                    setTimeout(() => {
                        appendMessage("bot", response);
                    }, 1000);
                }

                function appendMessage(sender, message) {
                    const chatLog = document.getElementById("chat-log");
                    const messageElement = document.createElement("div");
                    messageElement.className = `${sender}-message`;
                    messageElement.textContent = message;
                    chatLog.appendChild(messageElement);
                    chatLog.scrollTop = chatLog.scrollHeight;
                }
            });

            // Footer
            let lastScrollTop = 0;
            window.addEventListener('scroll', function () {
                let footer = document.querySelector('footer');
                let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
                let windowHeight = window.innerHeight;
                let documentHeight = document.documentElement.scrollHeight;

                if (currentScroll + windowHeight >= documentHeight - 100) {
                    footer.classList.add('show');
                } else {
                    if (currentScroll > lastScrollTop) {
                        footer.classList.remove('show');
                    } else {
                        footer.classList.add('show');
                    }
                }
                lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
            });

            document.addEventListener("DOMContentLoaded", function () {
                const footerToggleButton = document.getElementById("footer-toggle");
                const footerContent = document.querySelector("footer .footer-content");

                footerToggleButton.addEventListener("click", function () {
                    footerContent.classList.toggle("visible");
                });
            });
        });

    </script>

</body>

</html>