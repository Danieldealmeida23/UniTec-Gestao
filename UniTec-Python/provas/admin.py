from django.contrib import admin
from .models import Sessao, Aluno, Professor, Prova


admin.site.register(Sessao)
admin.site.register(Aluno)
admin.site.register(Professor)
admin.site.register(Prova)