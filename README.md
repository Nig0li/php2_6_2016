# Исправления

throw new E404 | 
file - App\Controllers\News | 
line - 27 

Запись ошибок в текстовый лог 
\App\error_log\logs.txt 
и выдача пользователю страницы с сообщением об ошибке 
\App\Controllers\Error 

file - index | 
line - 16 | 
line - 18 

# lesson_6

psr/log | 
file - App\Components\Logger | 
line - 7 | 
line - 9 | 
line - 44 | 

twig/twig | 
file - App\Controllers\News | 
line - 15 | 
line - 25 | 

twig/twig | 
file - App\Components\View | 
line - 40 | 
line - 53 | 

twig/twig | 
file - App\Templates\index | 
line - 26-47 | 

twig/twig | 
file - App\Templates\article | 
line - 26-34 | 

Использование пакета composer | 
throw new MultiException | 
file - Models\News | 
line - 87 | 
line - 90 | 
line - 93 | 

catch MultiException | 
file - Controllers\AdminPanel | 
line - 40 | 
line - 60 