document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('sortable');
    const sortable = new Sortable(el, {
        animation: 150,
        onEnd: function (evt) {
            const items = Array.from(el.children).map(item => item.getAttribute('data-id'));
            updatePriority(items);
        }
    });

    function updatePriority(items) {
        fetch('/update-priority', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content 
            },
            body: JSON.stringify({ items: items })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                console.log('Priority updated successfully');
                updateTaskDisplays(); 
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function updateTaskDisplays() {
        const taskElements = document.querySelectorAll('#sortable .card');
        taskElements.forEach((taskElement, index) => {
            const badge = taskElement.querySelector('.badge');
            if (badge) {
                badge.textContent = `Priority Level: ${index + 1}`;
            }
        });
    }
});
