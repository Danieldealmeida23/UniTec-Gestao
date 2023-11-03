from django.db import models
from django.contrib.auth.models import User



class Sessao(models.Model):
    objects = None
    sessao_usuario = models.CharField(max_length=250)
    pub_date = models.DateTimeField('date acesso')

    def __str__(self):
        return self.sessao_usuario



class Aluno(models.Model):
    sessao_usuario = models.ForeignKey(Sessao, on_delete=models.CASCADE)
    id_aluno = models.CharField(max_length=20)
    id_curso = models.CharField(max_length=20)
    id_materia = models.CharField(max_length=20)
    id_professor = models.CharField(max_length=20)
    id_turma = models.CharField(max_length=20)
    endereco_mac = models.CharField(max_length=200)
    id_aula = models.CharField(max_length=20)


