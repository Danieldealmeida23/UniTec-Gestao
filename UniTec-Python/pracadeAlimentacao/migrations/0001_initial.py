# Generated by Django 3.2.21 on 2023-09-06 15:18

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Loja',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nome_loja', models.CharField(max_length=200)),
                ('cnpj_loja', models.CharField(max_length=20)),
                ('cardapio', models.CharField(max_length=1000)),
                ('horario_abertura', models.TimeField(verbose_name='horario abertura')),
                ('horario_fechamento', models.TimeField(verbose_name='horario fechamento')),
            ],
        ),
        migrations.CreateModel(
            name='Pedido',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('id_loja', models.CharField(max_length=20)),
                ('data_pedido', models.DateTimeField(verbose_name='data pedido')),
                ('validade_pedido', models.CharField(max_length=50)),
                ('forma_pg', models.CharField(max_length=50)),
                ('troco', models.CharField(max_length=5)),
                ('horario_agendamento', models.TimeField(verbose_name='horario agendamento')),
            ],
        ),
        migrations.CreateModel(
            name='Sessao',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('sessao_usuario', models.CharField(max_length=250)),
                ('pub_date', models.DateTimeField(verbose_name='date acesso')),
            ],
        ),
        migrations.CreateModel(
            name='Aluno',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('id_aluno', models.CharField(max_length=20)),
                ('id_curso', models.CharField(max_length=20)),
                ('id_materia', models.CharField(max_length=20)),
                ('id_professor', models.CharField(max_length=20)),
                ('id_turma', models.CharField(max_length=20)),
                ('sessao_usuario', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='pracadeAlimentacao.sessao')),
            ],
        ),
    ]