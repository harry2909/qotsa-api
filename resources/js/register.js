export default function init() {
    const showRegistrationForm = document.querySelector('.js-show-registration-form');
    const showLoginForm = document.querySelector('.js-show-login-form');
    let userEndpoint;
    const submitButton = document.querySelector('.js-user-submit');
    if (showRegistrationForm && showLoginForm) {
        showRegistrationForm.addEventListener('click', () => {
            userEndpoint = '/register'
            submitButton.innerHTML = 'Register';
        });
        showLoginForm.addEventListener('click', () => {
            userEndpoint = '/login'
            submitButton.innerHTML = 'Login';
        });
    }
    const registrationForm = document.querySelector('.js-register');
    if (registrationForm) {
        registrationForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(registrationForm);

            try {
                const response = await fetch(userEndpoint, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                registrationForm.classList.add('hidden'); // Hide the form here.

                // Call the function to generate the token after successful registration
                await generateToken();
            } catch (error) {
                console.log('There was a problem with the fetch operation: ' + error.message);
            }
        });
    }

    async function generateToken() {
        try {
            const response = await fetch('/generate-token', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            const token = document.querySelector('#js-token');
            token.classList.toggle('hidden');
            token.innerHTML = data.token;
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while generating the token.');
        }
    }
}

init();
