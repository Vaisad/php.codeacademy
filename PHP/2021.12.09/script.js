

document.addEventListener('DOMContentLoaded', function () {
    const formBlock = document.getElementById('contact-form');

    const ACTION = formBlock.getAttribute('data-action');
    const METHOD = formBlock.getAttribute('data-method');

    let photo = document.querySelector('#photo');
    let lang = document.getElementsByName('langs[]');

    document.querySelector('button').addEventListener('click', async function () {
        let elements = document.querySelectorAll('#contact-form [name]');
        const formData = new FormData();

        [...elements].map(element => {
            if (element.name !== 'langs[]') {
                formData.append(element.name, element.value);

                if (element.files) {
                    for (let file of element.files) {
                        formData.append(element.name, file);
                    }
                }
            }
        });

        lang.forEach(el => {
            if (el.checked) {
                formData.append(el.name, el.value);
            }
        });



        let response = await fetch(ACTION, {
            method: METHOD,
            body: formData
        });

        response = await response.text();

        photo.src = response;
    });
});
