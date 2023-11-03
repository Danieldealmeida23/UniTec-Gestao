from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User, Group
from django.contrib.auth.decorators import user_passes_test 
# Create your views here.


def is_professor(user):
    return user.groups.filter(name="Professor").exists()


professor_required = user_passes_test(is_professor)

@login_required
def visualizar(request):
    exibe_infos = {
        'nome': "Pedro",
        'aula_ide': "Python",
        'materia_ide': "Engenharia de Software",
        'horario_aula': "Noturno",
        'professor_ide': "Exemplo",
        'turma_ide': "1C635-N",
        'data_prova': "20/10/2023",
        

    }
    return render(request, 'visualizar/index.html', exibe_infos)


@login_required
@professor_required
def cadastrar(request):
    exibe_infos = {
        'nome_professor': "Daniel",
        'aula_ide': "Python",
        'materia_ide': "Engenharia de Software",

    }
    return render(request, 'cadastrar/index.html', exibe_infos)