from django.urls import path
from . import views

urlpatterns = [
    path('visualizar/', views.visualizar, name='visualizar'),
    path('cadastrar/', views.cadastrar, name='cadastrar')
]