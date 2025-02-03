const { createApp } = Vue;

createApp({
    data() {
        return {
            userCode: '',
            exitCode: '',
            correctAnswer: 'un écho',
            newCode: '1234', // Le nouveau code à donner si l'énigme est résolue
            coordinates: { x: 0, y: 0 }
        };
    },
    methods: {
        submitCode() {
            // Vérification de la réponse de l'énigme
            if (this.userCode.toLowerCase() === this.correctAnswer) {
                alert(`Bonne réponse! Voici le nouveau code: ${this.newCode}`);
            } else {
                alert('Mauvaise réponse. Veuillez réessayer.');
            }
        },
        submitExitCode() {
            // Logique pour soumettre le code de sortie
            if (this.exitCode === '3107') {
                alert('Code correct! Vous pouvez sortir.');
            } else {
                alert('Code incorrect. Veuillez réessayer.');
            }
        },
        updateCoordinates(event) {
            this.coordinates.x = event.clientX;
            this.coordinates.y = event.clientY;
        },


    },
    mounted() {
        console.log('Vue est monté');
    }
}).mount('#app');