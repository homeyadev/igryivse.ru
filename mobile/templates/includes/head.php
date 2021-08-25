<meta http-equiv="Content-Type" content="text/html, user-scalable=no, charset=utf-8">
<link rel="shortcut icon" href="/sources/favicon.ico" type="image/x-icon">

<style>
    main {
        background-color: #ededed;
        width: 100vw;
        font-family: monospace;
        position: relative;
        min-height: calc(100vh - 25vw);
        padding-top: 1px;
    }

    footer {
        width: 100vw;
        height: 26vw;
        position: relative;
        z-index: 0;
        background: linear-gradient(45deg, #363636 35%, #4d4d4d 65%);
	    margin-top: -1%;
    }

    header {
        width: 100vw;
        height: 12vw;
        position: relative;
        background: linear-gradient(45deg, #363636 35%, #4d4d4d 65%);
    }
    
    body {
        overflow-x: hidden;
        margin: 0;
    }

    #avatar {
        height: auto;
        width: 5vw;
        border-radius: 30px;
        margin: auto;
        margin: 1%;
        z-index: 1;
        -webkit-user-drag: none;
        margin-left: 2.5vw;
        margin-top: 3.5%;
    }

    #foot-logo {
        height: auto;
        width: 7.5vw;
        border-radius: 45px;
        margin: auto;
        z-index: 1;
        -webkit-user-drag: none;
        left: 6vw;
        top: 8vw;
        position: absolute;
    }

    .head-btn {
        width: 14%;
        margin-top: 2vw;
        margin-right: 3vw;
        margin-left: auto;
        padding-top: 2vw;
        padding-bottom: 2vw;
        border-radius: 30px;
        background-color: transparent;
        border-color: transparent;
        color: #fff;
        position: relative;
        float: right !important;
        font-size: 2.1vw;
        font-family: monospace;
        font-weight: bold;
        z-index: 1;
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
        font-size: 4vw;
        left: 15vw;
    }

    .main-link {
        left: 24.5vw;
        width: 15vw;
        margin-top: 1vw;
        font-family: monospace;
        font-size: 2vw;
        font-weight: 700;
        position: relative;
        text-align: center;
        top: -.5vw;
    }
    .main-link a {
        color: #fff;
    }

    .external-link {
        left: 60vw;
        width: 15vw;
        margin-top: 2vw;
        font-family: monospace;
        font-size: 2vw;
        font-weight: 700;
        position: relative;
        text-align: center;
        top: -13.5vw;
    }
    .external-link a {
        color: #fff;
    }

    #donation {
        width: 55px;
        height: 55px;
        position: fixed;
        bottom: 6vh;
        right: 30%;
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
        display: block;
        height: 200%;
        width: 200%;
        right: 180px;
        position: relative;
        box-shadow: 0 0 1vh #f57d07;
        background-color: #f57d07;
        border-radius: 60px;
    }

    #msg {
        display: none;
        background-color: #f1f1f1;
        border-radius: 20px;
        position: relative;
        top: -450px;
        left: -300px;
        width: 340px;
        height: 300px;
        z-index: -1;
        border: solid #f57d07 5px;
        box-shadow: 0 0 1vh #f57d07;
    }
    #msg:target {
        display: block;
    }
    #msg #txt {
        text-align: center;
        font-family: monospace;
        font-size: 25px;
        width: 90%;
        height: 80%;
        margin: auto;
        top: 11%;
        position: relative;
    }
    #msg #close {
        background-color: #c10000;
        width: 40px;
        height: 40px;
        position: absolute;
        top: -3%;
        left: -3%;
        border-radius: 30px;
        display: block;
    }
    #msg #link {
        position: relative;
        width: 60%;
        height: 60px;
        border-radius: 30px;
        box-shadow: 0 0 .5vh #f57d07;
        background-color: #f57d07;
        color: #fff;
        border: solid transparent 0;
        font-size: 25px;
        font-weight: 700;
        margin: auto;
        bottom: 20px;
        display: block;
    }

    #not-real {
        position: relative;
        bottom: 14vw;
        margin: auto;
        color: #fff;
        font-size: 2vw;
        font-weight: 300;
        text-align: center;
    }
</style>