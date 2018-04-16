$(document).ready(function() {
    $('#validador').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Tela de login
            usuarios_usuario: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Continue digitando'
                    },
                    notEmpty: {
                        message: 'Por favor informe o usuário'
                    }
                }
            },
            usuarios_senha: {
                validators: {
                    stringLength: {
                        min: 6,
                        message: 'A senha deve conter no mínimo 6 dígitos'
                    },
                    notEmpty: {
                        message: 'Por favor informe a senha'
                    }
                }
            },
            // Tela de criar conta
            usuarios_nome: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Continue digitando'
                    },
                    notEmpty: {
                        message: 'Por favor informe um nome'
                    }
                }
            },
            usuarios_sobrenome: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'Continue digitando'
                    },
                    notEmpty: {
                        message: 'Por favor informe um sobrenome'
                    }
                }
            },
            usuarios_matricula: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe uma matrícula'
                    }
                }
            },
            usuarios_senha_criar: {
                validators: {
                    identical: {
                        field: 'usuarios_senha_repetir',
                        message: 'A senha e a confirmação não são as mesmas'
                    },
                    stringLength: {
                        min: 6,
                        message: ' '
                    },
                    notEmpty: {
                        message: 'Por favor informe uma senha'
                    }
                }
            },
            usuarios_senha_repetir: {
                validators: {
                    identical: {
                        field: 'usuarios_senha_criar',
                        message: 'A senha e a confirmação não são as mesmas'
                    },
                    stringLength: {
                        min: 6,
                        message: ' '
                    },
                    notEmpty: {
                        message: 'Por favor repita a senha'
                    }
                }
            },
            usuarios_setor: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe um setor de trabalho'
                    }
                }
            },
            usuarios_telefone: {
                validators: {
                    stringLength: {
                        min: 11,
                        message: 'Por favor complete seu telefone'
                    },
                    notEmpty: {
                        message: 'Por favor informe um telefone para contato'
                    }
                }
            },
            usuarios_celular: {
                validators: {
                    stringLength: {
                        min: 11,
                        message: 'Por favor complete seu telefone'
                    }
                }
            },
            usuarios_email: {
                validators: {
                    emailAddress: {
                        message: 'O e-mail digitado não é um endereço de e-mail válido'
                    }
                }
            },
            usuarios_cpf: {
                validators: {
                    stringLength: {
                        min: 11,
                        message: 'CPF incompleto, continue digitando'
                    },
                    notEmpty: {
                        message: 'Por favor informe o CPF para recuperação de senha'
                    }
                }
            },
            usuarios_sexo: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe o seu sexo'
                    }
                }
            },
            usuarios_data_nascimento: {
                validators: {
                    stringLength: {
                        min: 10,
                        message: 'Por favor complete a sua data de nascimento'
                    }
                }
            },
            usuarios_imagem: {
                validators: {
                    stringLength: {
                        min: 1,
                        message: 'Erro: formato inválido, por favor tente outra imagem'
                    }
                }
            },
            // Tela de criar novo chamado
            chamados_setor: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe um setor para realização do serviço'
                    }
                }
            },
            chamados_categoria: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe uma categoria para sua ocorrência'
                    }
                }
            },
            chamados_descricao: {
                validators: {
                    stringLength: {
                        min: 5,
                        max: 1000,
                        message: 'A descrição deve conter de 5 a 1000 caracteres'
                    }
                }
            },
            chamados_prioridade: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe adequadamente a prioridade'
                    }
                }
            },
            chamados_anexo: {
                validators: {
                    stringLength: {
                        min: 1,
                        message: 'Erro: formato inválido, por favor tente outra imagem'
                    }
                }
            },
            // Tela de visualizar usuário
            usuario_permissao: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe uma permissão'
                    }
                }
            },
            usuario_status: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe o status'
                    }
                }
            },
            // Tela de adcionar ocorrência
            ocorrencias_ocorrencia: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'A ocorrência deve conter no mínimo 2 caractere'
                    },
                    notEmpty: {
                        message: 'Por favor informe a ocorrência'
                    }
                }
            },
            // Tela de adcionar setor
            setores_setor: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'O setor deve conter no mínimo 2 caractere'
                    },
                    notEmpty: {
                        message: 'Por favor informe o nome do setor'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-1').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Modal de alterar anexo
            chamados_anexo: {
                validators: {
                    notEmpty: {
                        message: 'Por favor selecione um arquivo'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-2').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Modal de postagem de feedback
            feedbacks_feedback: {
                validators: {
                    notEmpty: {
                        message: 'Por favor preencha uma informação'
                    },
                    stringLength: {
                        min: 5,
                        max: 1000,
                        message: 'A descrição deve conter de 5 a 1000 caracteres'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-3').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Modal de analista para enviar chamado
            responsavel_id: {
                validators: {
                    notEmpty: {
                        message: 'Por favor selecione um responsável para a realização do serviço'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-4').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Modal de técnico para finalizar o chamado
            chamado_finalizar_chamado: {
                validators: {
                    stringLength: {
                        min: 5,
                        max: 1000,
                        message: 'A descrição deve conter de 5 a 1000 caracteres'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-5').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Modal de técnico para finalizar o chamado
            chamado_cancelar_chamado: {
                validators: {
                    notEmpty: {
                        message: 'Por favor descreva o motivo do cancelamento'
                    },
                    stringLength: {
                        min: 5,
                        max: 1000,
                        message: 'A descrição deve conter de 5 a 1000 caracteres'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-6').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Perfil de usuário
            usuarios_senha_atual: {
                validators: {
                    stringLength: {
                        min: 6,
                        message: 'A senha tem no mínimo 6 dígitos'
                    },
                    notEmpty: {
                        message: 'Por favor informe a senha atual'
                    }
                }
            },
            usuarios_senha_criar: {
                validators: {
                    identical: {
                        field: 'usuarios_senha_repetir',
                        message: 'A nova senha e a confirmação não são as mesmas'
                    },
                    stringLength: {
                        min: 6,
                        message: ' '
                    },
                    notEmpty: {
                        message: 'Por favor informe uma nova senha'
                    }
                }
            },
            usuarios_senha_repetir: {
                validators: {
                    identical: {
                        field: 'usuarios_senha_criar',
                        message: 'A nova senha e a confirmação não são as mesmas'
                    },
                    stringLength: {
                        min: 6,
                        message: ' '
                    },
                    notEmpty: {
                        message: 'Por favor repita a nova senha'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-7').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Tela de adicionar novo setor de serviço
            setores_servicos_nome: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe o novo setor de serviço'
                    }
                }
            }
        }
    })
});

$(document).ready(function() {
    $('#validador-8').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            // Tela de contato
            email_motivo: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe o motivo do contato'
                    }
                }
            },
            email_mensagem: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe a mensagem'
                    },
                    stringLength: {
                        min: 5,
                        max: 1000,
                        message: 'A mensagem deve conter de 5 a 1000 caracteres'
                    }
                }
            }
        }
    })
});