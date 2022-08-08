
    Echo.private('post-status-'+ window.user.id)
    .listen('.App\\Events\\PostStatus', (e) => {
        if(confirm("Data changed. Do you want to refresh?")){
            location.reload();
        }
    });