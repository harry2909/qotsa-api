// Cache selectors at the start eliminates the need for repeated querying
const elements = {
    showRegistrationForm: document.querySelector('.js-show-registration-form'),
    showTokenForm: document.querySelector('.js-show-token-form'),
    submitButton: document.querySelector('.js-user-submit'),
    userManagementForm: document.querySelector('.js-user-management'),
    token: document.querySelector('#js-token'),
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

export default function init() {
    let userEndpoint;
    let tokenEndpoint;

    // Abstract repeated code into separate helpers function:
    const updateEndpointsAndButton = (user, token, button) => {
        userEndpoint = user;
        tokenEndpoint = token;
        elements.submitButton.innerHTML = button;
    };

    const errorHandling = errorMessage => console.log('There was a problem with the fetch operation: ' + errorMessage);

    if (elements.showRegistrationForm && elements.showTokenForm) {
        elements.showRegistrationForm.addEventListener('click', () => updateEndpointsAndButton('/register', '/generate-token', 'Register'));
        elements.showTokenForm.addEventListener('click', () => updateEndpointsAndButton('/login', '/generate-token', 'Generate Token'));
    }

    if (elements.userManagementForm) {
        elements.userManagementForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(elements.userManagementForm);

            try {
                const response = await fetch(userEndpoint, {
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': elements.csrf},
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                elements.userManagementForm.classList.add('hidden'); // Hide the form here.
                // Call the function to generate the token after successful registration
                await fetchToken(tokenEndpoint);
            } catch (error) {
                elements.userManagementForm.classList.remove('hidden');
                errorHandling(error.message);
            }
        });
    }

    async function fetchToken(tokenEndpoint) {
        try {
            const response = await fetch(tokenEndpoint, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': elements.csrf,
                },
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            elements.token.classList.toggle('hidden');
            elements.token.innerHTML = data.token;
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while generating the token.');
        }
    }
}

init();
