class ChallengeController {
    constructor() {
        this.handleAnswers();
    }

    handleAnswers() {
        const container = document.querySelector('#challenge_answers');
        const inputsLength = container.querySelectorAll('input').length;
        const button = document.getElementById("challenge_add_answer");

        container.dataset.index = inputsLength.toString();

        button.addEventListener("click", function () {
            const index = Number(container.dataset.index || 0);
            const prototype = container.dataset.prototype;
            const content = prototype.replace(/__name__/g, index);
            const newControl = document.createElement('div');
            newControl.innerHTML = content;
            container.appendChild(newControl);

            container.dataset.index = (index + 1).toString();
        });
    }
}

new ChallengeController();