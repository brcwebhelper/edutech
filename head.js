import React, { useEffect } from 'react';
import './style.css';

const HeaderComponent = () => {
    useEffect(() => {
        const smoothTransition = document.querySelector('.smooth-transition');
        const innerContainers = document.querySelectorAll('.inner-container');

        const transitionHandler = () => {
            setTimeout(() => {
                smoothTransition.style.right = '0';
            }, 500);
        };

        const moveRobotHandler = () => {
            setInterval(() => {
                let currentTime = new Date();
                let seconds = parseFloat(currentTime.getSeconds()) + parseFloat(currentTime.getMilliseconds()) / 1100;
                let radians = (2 * Math.PI * seconds) / 35;
                let radius = 140;
                let angleIncrement = (2 * Math.PI) / innerContainers.length;
                let center = { x: 0, y: -55 };

                innerContainers.forEach((container, index) => {
                    let currentAngle = angleIncrement * index;
                    let x = center.x + radius * Math.cos(radians + currentAngle);
                    let y = center.y + radius * Math.sin(radians + currentAngle);
                    container.style.transform = `translate(${x}px, ${y}px)`;
                });
            }, 10);
        };

        const yesButtonClickHandler = () => {
            const yesButton = document.getElementById("yes-button");
            const signupButton = document.getElementById("signup-button");
            const questionMark = document.querySelector(".question-mark");
            const imageContainer = document.querySelector(".image-container");
            const replacementImage = document.getElementById("replacement-image");

            yesButton.style.display = "none";
            signupButton.style.display = "inline-block";
            questionMark.classList.add("hidden");
            imageContainer.classList.remove("hidden");
            replacementImage.classList.add("glow", "floating");
        };

        const signupButtonClickHandler = () => {
            window.location.href = "login.html"; // Change to your login page URL
        };

        document.addEventListener('DOMContentLoaded', transitionHandler);
        document.addEventListener('DOMContentLoaded', moveRobotHandler);
        document.getElementById("yes-button").addEventListener("click", yesButtonClickHandler);
        document.getElementById("signup-button").addEventListener("click", signupButtonClickHandler);

        return () => {
            document.removeEventListener('DOMContentLoaded', transitionHandler);
            document.removeEventListener('DOMContentLoaded', moveRobotHandler);
            document.getElementById("yes-button").removeEventListener("click", yesButtonClickHandler);
            document.getElementById("signup-button").removeEventListener("click", signupButtonClickHandler);
        };
    }, []);

    return (
        <div className="home_body" tabIndex="0">
            <iframe id="background" src="sky home background.html"></iframe>
            <section>
                <div className="header-container">
                    <header>
                        <div className="logo">
                            <img src="icon_prev_ui.png" alt="Company Logo" width="0px" height="60px" />
                        </div>
                        <nav>
                            <a href="#home">Home</a>
                            <a href="#courses">Courses</a>
                            <a href="#about">About</a>
                            <a href="#login">LMS</a>
                            <a href="#signup">Signup/Login</a>
                        </nav>
                    </header>
                </div>

                <div className="content-container" style={{textAlign: 'left'}}>
                    <div className="text-container">
                        <p><h1>Want help in career?</h1></p>
                        <p style={{fontSize: '25px', fontFamily: 'Times New Roman, Times, serif'}}>
                            We are dedicated to guiding India's future by helping individuals make the right career choices. 
                            Let's explore how we can assist you in navigating your career path and what steps you can take 
                            to ensure your professional success.
                        </p>
                        <p>
                            <div className="buttons">
                                <button id="yes-button" style={{fontWeight: 'bold'}}>Yes</button>
                                <button id="signup-button" style={{display: 'none'}}>Sign Up</button>
                                <button style={{fontWeight: 'bold'}}>No</button>
                            </div>
                        </p>
                    </div>
                    
                    <div className="container">
                        <img src="ques.jpeg" alt="Futuristic Robot" className="robot-image" width="500px" height="550px" />
                        <div className="question-mark line-1">?</div>
                        <div className="image-container hidden">
                            <img id="replacement-image" src="bulb.png" alt="Replacement Image" style={{width: '130px', height: '100px'}} />
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div className="smooth-transition">
                    <div className="outer-container">
                        <div className="logos-container">
                            <div className="stars"></div>
                            
                            <div className="inner-container" style={{left: '210px', top: '210px'}}>
                                <img src="icon/icon (1).png" className="logo" id="logo1" />
                            </div>
                            <div className="inner-container" style={{left: '210px', top: '210px'}}>
                                <img src="icon/icon (2).png" className="logo" id="logo2" />
                            </div>
                            <div className="inner-container" style={{left: '210px', top: '210px'}}>
                                <img src="icon/icon (3).png" className="logo" id="logo3" />
                            </div>
                            <div className="inner-container" style={{left: '210px', top: '210px'}}>
                                <img src="icon/icon (4).png" className="logo" id="logo4" />
                            </div>
                            <div className="inner-container" style={{left: '210px', top: '210px'}}>
                                <img src="icon/icon (5).png" className="logo" id="logo5" />
                            </div>
                            <div className="inner-container" style={{left: '210px', top: '210px'}}>
                                <img src="icon/icon (6).png" className="logo" id="logo6" />
                            </div>
                        </div>
                        <div className="text-container">
                            <div className="text">
                                <h2>Do you want to Update your skills ?</h2>
                            </div>
                            <h3>We provide the best mentorship, guidance, and support to help you grow and excel in your domain. Our dedicated team is committed to ensuring that you receive the personalized attention and resources needed to thrive. With our comprehensive approach, we empower you to overcome challenges, seize opportunities, and reach your fullest potential. Whether you're just starting your journey or looking to advance in your field, our goal is to be your trusted partner every step of the way.</h3>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
};

export default HeaderComponent;
