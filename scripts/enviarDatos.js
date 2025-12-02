$(document).ready(function () {

    // ======== ENVÍO DE TEXTO NORMAL ========
    $('#send-btn').click(function () {
        enviarTexto();
    });

    $("#data").keypress(function (e) {
        if (e.which === 13) enviarTexto();
    });

    function enviarTexto() {
        const text = $('#data').val().trim();
        if (!text) return;

        const userMsg = `
            <div class="user-inbox inbox">
                <div class="msg-header"><p>${text}</p></div>
            </div>`;

        $(".form").append(userMsg);
        $('#data').val("");

        $.ajax({
            url: 'controller.php',
            type: 'POST',
            data: { text },
            success: function (result) {

                const botMsg = `
                    <div class="bot-inbox inbox">
                        <div class="icon"><i class="fas fa-robot"></i></div>
                        <div class="msg-header"><p>${result}</p></div>
                    </div>`;

                $(".form").append(botMsg);
                $(".form").scrollTop($(".form")[0].scrollHeight);

                // 🔊 Leer respuesta en voz alta
                leerVoz(result);
            }
        });
    }

    // ======== LECTURA EN VOZ DEL BOT ========
    function leerVoz(texto) {
        const speech = new SpeechSynthesisUtterance(texto);
        speech.lang = "es-AR";
        speech.pitch = 1;
        speech.rate = 1;
        window.speechSynthesis.speak(speech);
    }

    // ======== RECONOCIMIENTO DE VOZ ========
    let recognition;
    if ('webkitSpeechRecognition' in window) {
        recognition = new webkitSpeechRecognition();
        recognition.lang = "es-AR";
        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.onresult = function (event) {
            const voz = event.results[0][0].transcript;
            $("#data").val(voz);
            enviarTexto();
        };

        recognition.onerror = function () {
            $("#mic-btn").removeClass("listening");
        };

        recognition.onend = function () {
            $("#mic-btn").removeClass("listening");
        };
    }

    // ======== BOTÓN DE MICRÓFONO ========
    $("#mic-btn").click(function () {
        if (!recognition) {
            alert("Tu navegador no soporta reconocimiento de voz.");
            return;
        }

        $(this).addClass("listening");
        recognition.start();
    });
});
