$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nome: {
                    validators: {
                        stringLength: {
                            min: 2,
                            max: 30,
                            message: 'Introduza um nome válido'
                        },
                        notEmpty: {
                            message: 'Por favor informe o nome'
                        }
                    }
                },
                setor: {
                    validators: {
                        stringLength: {
                            min: 2,
                            max: 30,
                            message: 'Introduza um setor válido'
                        },
                        notEmpty: {
                            message: 'Por favor informe o setor'
                        }
                    }
                },
                ramal: {
                    validators: {
                        stringLength: {
                            min: 4,
                            max: 17,
                            message: 'Introduza um ramal válido'
                        },
                    }
                },
                ip: {
                    validators: {
                        stringLength: {
                            min: 7,
                            max: 15,
                            message: 'Introduza um IP válido'
                        },
                    }
                },
                categoria_id: {
                    validators: {
                        notEmpty: {
                            message: 'Por favor selecione uma opção'
                        }
                    }
                },
                problema: {
                    validators: {
                        stringLength: {
                            min: 5,
                            max: 150,
                            message: 'Introduza de 5 a 150 caracteres'
                        },
                        notEmpty: {
                            message: 'Por favor descreva o problema'
                        }
                    }
                },
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow")
            $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});