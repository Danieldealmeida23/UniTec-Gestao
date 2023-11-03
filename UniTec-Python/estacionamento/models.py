from django.db import models

# Create your models here.


class Sessao(models.Model):
    sessao_usuario = models.CharField(max_length=250)
    pub_date = models.DateTimeField('date acesso')


class Aluno(models.Model):
    sessao_usuario_id = models.ForeignKey(Sessao, on_delete=models.CASCADE)
    id_aluno = models.CharField(max_length=20)
    id_curso = models.CharField(max_length=20)
    id_materia = models.CharField(max_length=20)
    id_professor = models.CharField(max_length=20)
    id_turma = models.CharField(max_length=20)


class Estacionamento(models.Model):
    horário_chegada = models.DateTimeField('horario chegada')
    horario_saida = models.DateTimeField('horario saida')
    valor_diaria = models.FloatField('valor diaria')
    valor_pago = models.FloatField('valor pago')
    valor_a_pagar = models.FloatField('valor a pagar')
    modalidade_pag = models.CharField(max_length=50)
    status = models.CharField(max_length=20)

