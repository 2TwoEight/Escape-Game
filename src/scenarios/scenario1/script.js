const { createApp } = Vue;

createApp({
    data() {
        return {
            userCode: '',
            exitCode: '',
            correctAnswer: this.normalizeString('un écho'),
            RiddleAnswer: '1',
            coordinates: { x: 0, y: 0 },
            hasKey: false,
            score: 0,
            timer: 300, // 5 minutes
            mistakes: 0,
            interval: null
        };
    },
    methods: {
        startTimer() {
            this.interval = setInterval(() => {
                if (this.timer > 0) {
                    this.timer--;
                } else {
                    clearInterval(this.interval);
                    alert('Temps écoulé! Vous avez perdu.');
                }
            }, 1000);
        },
        calculateScore() {
            this.score = (this.timer * 10) - (this.mistakes * 5);
        },
        submitCode() {
            const normalizedUserCode = this.normalizeString(this.userCode);
            if (normalizedUserCode === this.correctAnswer) {
                alert(`Bonne réponse! Voici le nouveau nombre pour sortir: ${this.RiddleAnswer}`);
                this.calculateScore();
            } else {
                alert('Mauvaise réponse. Veuillez réessayer.');
                this.mistakes++;
            }
        },
        submitExitCode() {
            if (this.exitCode === '3107') {
                alert('Code correct! Vous êtes sortie. Bravo!');
                clearInterval(this.interval);
                this.calculateScore();
            } else {
                alert('Code incorrect. Veuillez réessayer.');
                this.mistakes++;
            }
        },
        updateCoordinates(event) {
            this.coordinates.x = event.clientX;
            this.coordinates.y = event.clientY;
        },

        getKey() {
            this.hasKey = true; // Update the variable when the key is obtained
            $('#modal2').modal('hide'); // Close the modal after getting the key
        },
        openArmoireModal(event) {
            if (this.hasKey) {
                $('#modal6').modal('show'); // Open the modal if the key is obtained
            } else {
                alert('Vous devez d\'abord récupérer la clé !'); // Show an alert if the key is not obtained
            }
        },

        normalizeString(str) {
            return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase();
        }

    },
    mounted() {
        this.startTimer();
    }
}).mount('#app');