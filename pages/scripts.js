document.addEventListener('DOMContentLoaded', function() {
    // Seleciona todos os selects de categoria
    const categorySelects = [
        document.getElementById('expenseCategory'),
        document.getElementById('incomeCategory')
    ];
    
    // Adiciona listener para cada select de categoria
    categorySelects.forEach(select => {
        if (select) {
            select.addEventListener('change', function() {
                if (this.value === 'nova-categoria') {
                    // Define o tipo de categoria com base no formulário atual
                    let categoryType = 'despesa';
                    if (this.id === 'incomeCategory') {
                        categoryType = 'receita';
                        document.getElementById('categoryTypeReceita').checked = true;
                    } else {
                        document.getElementById('categoryTypeDespesa').checked = true;
                    }
                    
                    // Abre o modal
                    $('#newCategoryModal').modal('show');
                    
                    // Armazena o select que foi clicado para atualizar depois
                    sessionStorage.setItem('lastCategorySelectId', this.id);
                }
            });
        }
    });
    
    // Adiciona listener ao botão de salvar categoria
    document.getElementById('saveNewCategory').addEventListener('click', function() {
        const categoryName = document.getElementById('categoryName').value;
        const categoryType = document.querySelector('input[name="categoryType"]:checked').value;
        const categoryColor = document.getElementById('categoryColor').value;
        
        if (categoryName) {
            // Aqui você adicionaria código para salvar a categoria no banco de dados
            // via uma requisição AJAX
            
            // Simulação de sucesso na criação da categoria
            const lastSelectId = sessionStorage.getItem('lastCategorySelectId');
            const select = document.getElementById(lastSelectId);
            
            if (select) {
                // Cria nova opção e adiciona ao select
                const newOption = document.createElement('option');
                newOption.text = categoryName;
                newOption.value = categoryName.toLowerCase().replace(/\s+/g, '-');
                
                // Insere a nova opção antes da opção "Criar nova categoria"
                const createNewOption = select.querySelector('option[value="nova-categoria"]');
                select.insertBefore(newOption, createNewOption);
                
                // Seleciona a nova categoria
                select.value = newOption.value;
                
                // Fecha o modal
                $('#newCategoryModal').modal('hide');
                
                // Limpa o formulário
                document.getElementById('newCategoryForm').reset();
                
                // Mostra mensagem de sucesso
                alert('Categoria criada com sucesso!');
            }
        } else {
            alert('Por favor, informe o nome da categoria.');
        }
    });
});