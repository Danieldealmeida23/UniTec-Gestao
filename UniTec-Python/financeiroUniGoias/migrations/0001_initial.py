# Generated by Django 3.2.21 on 2023-09-06 15:18

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Aluno',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('id_aluno', models.CharField(max_length=20)),
                ('id_curso', models.CharField(max_length=20)),
                ('id_materia', models.CharField(max_length=20)),
                ('id_professor', models.CharField(max_length=20)),
                ('id_turma', models.CharField(max_length=20)),
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
            name='Cadastro',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('login', models.CharField(max_length=200)),
                ('senha', models.CharField(max_length=250)),
                ('id_aluno_cadastro', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='financeiroUniGoias.aluno')),
            ],
        ),
        migrations.AddField(
            model_name='aluno',
            name='sessao_usuario_id',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='financeiroUniGoias.sessao'),
        ),
    ]
