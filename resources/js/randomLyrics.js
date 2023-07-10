export default function init() {
    const generateTokenButton = document.querySelector('#js-generate-token');
    generateTokenButton.addEventListener('click', () => {
        fetch('/generate-token', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
            .then(response => response.json())
            .then(data => {
                const token = document.querySelector('#js-token');
                token.innerHTML = data.token;
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('An error occurred while generating the token.');
            });
    });
}
init();
