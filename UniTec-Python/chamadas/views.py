from django.shortcuts import render
import io
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User, Group
from django.contrib.auth.decorators import user_passes_test
from django.http import HttpResponse
from functools import wraps
import segno
import base64


def is_professor(user):
    return user.groups.filter(name="Professor").exists()


professor_required = user_passes_test(is_professor)

@login_required
@professor_required
def index(request):
    qrcode = segno.make("https://unigoias.jacad.com.br/academico/aluno-v2/login", error='h')
    print = io.BytesIO()
    qrcode.save(print, scale=10, kind='png')
    print.seek(0)
    img = base64.b64encode(print.read())

    exibe_infos = {
        'nome_professor': "Daniel",
        'aula_ide': "Python",
        'materia_ide': "Engenharia de Software",
        'qrcode': img

    }
    return render(request, 'chamadas/index.html', exibe_infos)