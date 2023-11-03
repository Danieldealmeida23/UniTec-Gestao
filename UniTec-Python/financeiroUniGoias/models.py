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


class Cadastro(models.Model):
    id_aluno_cadastro = models.ForeignKey(Aluno, on_delete=models.CASCADE)
    login=models.CharField(max_length=200)
    senha=models.CharField(max_length=250)
