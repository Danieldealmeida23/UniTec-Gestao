from django.db import models
import base64

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


class Professor(models.Model):
    nome_professor = models.CharField(max_length=200)
    id_professor = models.CharField(max_length=20)
    id_curso = models.CharField(max_length=20)
    id_materia = models.CharField(max_length=20)
    id_turma = models.CharField(max_length=20)


class Prova(models.Model):
    id_prova = models.CharField(max_length=20)
    id_professor = models.CharField(max_length=20)
    id_turma = models.CharField(max_length=20)
    respostas = models.BinaryField



    
