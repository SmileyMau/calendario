
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorio</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e3e3e3;
            border-radius: 8px;
            overflow: hidden;
        }
        .email-header {
            text-align: center;
            padding: 20px;
            background-color: #383838;
            color: #ffffff;
        }
        .email-header img {
            max-width: 150px;
            height: auto;
        }
        .email-body {
            padding: 20px;
        }
        .email-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333333;
        }
        .email-description {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
        }
        .email-footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            font-size: 14px;
            color: #777777;
        }
    </style>

</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="{{ asset('storage/logo_st.png') }}" alt="Logo">
        </div>
        <div class="email-body">
            <p>Hola, {{ $evento->name }} {{ $evento->last_name }}!</p>
            <h1 class="email-title">Recordatorio Importante</h1>
            <h2>{{ $evento->titulo }}</h2>
            <p class="email-description">{{ $evento->descripcion }}</p>
        </div>
        <div class="email-footer">
            &copy; 2024 - Cronograma Electrónico de Documentos Normativos Administrativos
        </div>
    </div>
</body>
</html>
