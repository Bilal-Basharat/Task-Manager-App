import Sortable from 'sortablejs';

document.addEventListener('DOMContentLoaded', function() {
    const taskList = document.getElementById('taskList');
    if (!taskList) return;

    new Sortable(taskList, {
        animation: 150,
        ghostClass: 'bg-gray-100',
        onEnd: function() {
            const taskOrder = Array.from(taskList.children).map(item => item.dataset.taskId);
            const projectId = document.getElementById('project_id')?.value || 
                             taskList.children[0]?.dataset.projectId;

            fetch('/api/tasks/reorder', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    taskOrder: taskOrder,
                    projectId: projectId
                })
            });
        }
    });
});