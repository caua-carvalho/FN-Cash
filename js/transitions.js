document.addEventListener('DOMContentLoaded', function() {
    // Adiciona classe inicial para fade in
    document.body.classList.add('page-loaded');
    
    // Gerencia cliques em links
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.hostname === window.location.hostname) {
                e.preventDefault();
                const href = this.getAttribute('href');
                
                // Adiciona classe de saída
                document.body.classList.remove('page-loaded');
                document.body.classList.add('page-exit');
                
                // Navega após a animação
                setTimeout(() => {
                    window.location.href = href;
                }, 300);
            }
        });
    });

    // Gerencia submissões de formulário
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            document.body.classList.remove('page-loaded');
            document.body.classList.add('page-exit');
        });
    });
});

// Adiciona listener para quando a página é carregada do cache
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        document.body.classList.remove('page-exit');
        document.body.classList.add('page-loaded');
    }
});
