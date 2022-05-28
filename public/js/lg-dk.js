

function login_register(){
    $('.btn--register').onclick = () => {
        anima_hiden($('.form--login'))
        anima_block( $('.form--register'))
    }
    $('.btn--login').onclick = () => {
        anima_hiden($('.form--register'))
        anima_block( $('.form--login'))
    }
    window.onload = () => {
        anima_hiden($('.form--register'))
        anima_block( $('.form--login'))
    }
    function anima_hiden(ts) {
        Object.assign(
            ts.style, {
            transform: "translateY(100%)",
            opacity:"0"
        })
    }
    function anima_block(ts) {
        Object.assign(
            ts.style, {
            transform: "translateY(0)",
            opacity:"1"
        })
    }
}

login_register();
