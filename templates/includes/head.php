<meta http-equiv="Content-Type" content="text/html, user-scalable=no, charset=utf-8">
<link rel="shortcut icon" href="/sources/favicon.ico" type="image/x-icon">

<style>
    main {
        background-color: #ededed;
        width: 100vw;
        font-family: monospace;
        position: relative;
        min-height: calc(100vh - 14vw);
        padding-top: 1px;
    }

    footer {
        width: 100vw;
        height: 14vw;
        position: relative;
        z-index: 0;
        background: linear-gradient(45deg, #363636 35%, #4d4d4d 65%);
	    margin-top: -1%;
    }

    header {
        width: 100vw;
        height: 8vw;
        position: relative;
        background: linear-gradient(45deg, #363636 35%, #4d4d4d 65%);
    }
    
    body {
        overflow-x: hidden;
        margin: 0;
    }

    #avatar {
        height: auto;
        width: 3vw;
        border-radius: 30px;
        margin: auto;
        margin: 1%;
        z-index: 1;
        -webkit-user-drag: none;
        margin-left: 2.5vw;
        margin-top: 2.5%;
    }

    #foot-logo {
        height: auto;
        width: 5vw;
        border-radius: 45px;
        margin: auto;
        z-index: 1;
        -webkit-user-drag: none;
        left: 4vw;
        top: 4vw;
        position: absolute;
    }

    .head-btn {
        width: 10%;
        margin-top: 2vw;
        margin-right: 2vw;
        margin-left: auto;
        padding-top: 1vw;
        padding-bottom: 1vw;
        border-radius: 20px;
        background-color: transparent;
        border-color: transparent;
        color: #fff;
        position: relative;
        float: right !important;
        font-size: 1.1vw;
        font-family: monospace;
        font-weight: bold;
        z-index: 1;
    }
    .head-btn:hover {
        background-color: #fff;
        color: #000;
        transition-duration: 0.3s;
        box-shadow: 0 0 0.5vw #fff;
    }
    .head-btn:hover a{
        color: #000;
    }
    .head-btn a {
        color: #fff;
        text-decoration: none;
        width: 10%;
    }

    .foot-header {
        float: left !important;
        margin-left: 10vw;
        margin-right: auto;
        z-index: 1;
        position: relative;
        color: #fff;
        font-family: monospace;
        font-weight: 900;
        font-size: 2vw;
        left: 15vw;
    }

    .main-link {
        left: 24.5vw;
        width: 10vw;
        margin-top: 1vw;
        font-family: monospace;
        font-size: 1vw;
        font-weight: 700;
        position: relative;
        text-align: center;
        top: -.5vw;
    }
    .main-link a {
        color: #fff;
    }

    .external-link {
        left: 46.5vw;
        width: 10vw;
        margin-top: 1vw;
        font-family: monospace;
        font-size: 1vw;
        font-weight: 700;
        position: relative;
        text-align: center;
        top: -7vw;
    }
    .external-link a {
        color: #fff;
    }

    #donation {
        width: 55px;
        height: 55px;
        position: fixed;
        bottom: 6vh;
        right: 5vw;
        z-index: 10;  
    }
    #donation img {
        width: 60%;
        height: 70%;
        left: 21.5%;
        top: 17%;
        position: relative;
        -webkit-user-drag: none;
    }
    #donation #open {
        box-shadow: 0 0 0.5vw #f57d07;
        background-color: #f57d07;
        border-radius: 50px;
    }

    #msg {
        display: none;
        background-color: #f1f1f1;
        border-radius: 20px;
        position: relative;
        top: -220px;
        left: -200px;
        width: 240px;
        height: 200px;
        z-index: -1;
        border: solid #f57d07 5px;
        box-shadow: 0 0 0.5vw #f57d07;
    }
    #msg:target {
        display: block;
    }
    #msg #txt {
        text-align: center;
        font-family: monospace;
        font-size: 17px;
        width: 90%;
        height: 80%;
        margin: auto;
        top: 10%;
        position: relative;
    }
    #msg #close {
        background-color: #c10000;
        width: 25px;
        height: 25px;
        position: absolute;
        top: -3%;
        left: -3%;
        border-radius: 20px;
        display: block;
    }
    #msg #link {
        position: relative;
        width: 50%;
        height: 40px;
        border-radius: 20px;
        box-shadow: 0 0 0.5vw #f57d07;
        background-color: #f57d07;
        color: #fff;
        border: solid transparent 0;
        font-size: 15px;
        font-weight: 700;
        margin: auto;
        bottom: 10px;
        display: block;
    }

    #welcome {
        width: 100%;
        height: 100%;
        background-color: rgba(61, 61, 61, 0.5);
    }
    #welcome #win {
        width: 60%;
        height: 40%;
        background-color: #f2f2f2;
        border-radius: 30px;
        box-shadow: 0 0 1vw #f2f2f2;
    }

    #not-real {
        position: relative;
        bottom: 6vw;
        margin: auto;
        color: #fff;
        font-size: .7vw;
        font-weight: 300;
        text-align: center;
    }

    button:hover {
        cursor: pointer;
    }
</style>