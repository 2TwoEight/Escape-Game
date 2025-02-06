const { createApp } = Vue;

createApp({
    data() {
        return {
            userCode: '', // Code entré par l'utilisateur
            exitCode: '', // Code de sortie
            correctAnswer: this.normalizeString('un écho'), // Réponse correcte normalisée
            RiddleAnswer: '1', // Réponse à l'énigme
            coordinates: { x: 0, y: 0 }, // Coordonnées de la souris
            hasKey: false, // Indique si l'utilisateur a la clé
            score: 0, // Score de l'utilisateur
            timer: 300, // 5 minutes en secondes
            mistakes: 0, // Nombre d'erreurs
            interval: null // Intervalle pour le minuteur
        };
    },
    methods: {
        // Démarre le minuteur
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
        // Calcule le score
        calculateScore() {
            this.score = (this.timer * 10) - (this.mistakes * 5);
        },
        // Soumet le code entré par l'utilisateur pour l'énigme
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
        // Soumet le code de sortie
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
        // Met à jour les coordonnées de la souris
        updateCoordinates(event) {
            this.coordinates.x = event.clientX;
            this.coordinates.y = event.clientY;
        },
        // Obtient la clé
        getKey() {
            this.hasKey = true; // Met à jour la variable lorsque la clé est obtenue
            $('#modal2').modal('hide'); // Ferme la modal après avoir obtenu la clé
        },
        // Ouvre la modal de l'armoire
        openArmoireModal(event) {
            if (this.hasKey) {
                $('#modal6').modal('show'); // Ouvre la modal si la clé est obtenue
            } else {
                alert('Vous devez d\'abord récupérer la clé !'); // Affiche une alerte si la clé n'est pas obtenue
            }
        },
        // Normalise une chaîne de caractères
        normalizeString(str) {
            return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase();
        }
    },
    // Méthode appelée lorsque le composant est monté
    mounted() {
        this.startTimer();
    }
}).mount('#app');