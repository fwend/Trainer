
class ChallengeController {
    constructor() {
        this.handleAnswers();
    }

    handleAnswers() {
        const deleteButtonTemplate = `<div data-delete-target class="answer row mt-1">
            <div class="col-11">__content__</div>
            <div class="col-1">
            <button data-delete-button class="btn btn-secondary" type="button">x</button></div>
            </div>`;

        const container = document.querySelector('#challenge_answers');
        const answers = container.querySelectorAll('div.answer');
        const addButton = document.getElementById("challenge_add_answer");

        container.dataset.index = answers.length.toString();

        document.addEventListener("click", function (e) {
            if (e.target.hasAttribute('data-delete-button')) {
                let elem = e.target.closest('[data-delete-target]');
                if (elem) {
                    elem.remove();
                }
            }
        });

        addButton.addEventListener("click", function () {
            const index = Number(container.dataset.index || 0);
            const prototype = container.dataset.prototype;
            const content = prototype.replace(/__name__/g, index);
            const newControl = document.createElement('div');
            newControl.innerHTML = deleteButtonTemplate.replace(/__content__/, content);
            container.appendChild(newControl);

            container.dataset.index = (index + 1).toString();
        });
    }
}

new ChallengeController();