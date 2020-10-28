$('#txtDescricao').summernote({
    placeholder: 'Sua receita aqui ....',
    tabsize: 2,
    height: 120,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'fontname', 'fontsize', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['hr', 'link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]
});