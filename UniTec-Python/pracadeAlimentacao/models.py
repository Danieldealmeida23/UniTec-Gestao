from django.db import models

# Create your models here.


class Sessao(models.Model):
    sessao_usuario = models.CharField(max_length=250)
    pub_date = models.DateTimeField('date acesso')


class Aluno(models.Model):
    sessao_usuario = models.ForeignKey(Sessao, on_delete=models.CASCADE)
    id_aluno = models.CharField(max_length=20)
    id_curso = models.CharField(max_length=20)
    id_materia = models.CharField(max_length=20)
    id_professor = models.CharField(max_length=20)
    id_turma = models.CharField(max_length=20)


class Loja(models.Model):
    id_loja = models.AutoField
    nome_loja = models.CharField(max_length=200)
    cnpj_loja = models.CharField(max_length=20)
    cardapio = models.CharField(max_length=1000)
    horario_abertura = models.TimeField('horario abertura')
    horario_fechamento = models.TimeField('horario fechamento')


class Pedido(models.Model):
    id_loja = models.CharField(max_length=20)
    data_pedido = models.DateTimeField('data pedido')
    validade_pedido = models.CharField(max_length=50)
    forma_pg = models.CharField(max_length=50)
    troco = models.CharField(max_length=5)
    horario_agendamento = models.TimeField('horario agendamento')
