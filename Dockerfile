FROM php:8.3.12-cli

WORKDIR /app

COPY requirements.txt requirements.txt
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

RUN python manage.py collectstatic --noinput

EXPOSE 8001

CMD ["php", "artisan", "serve", "0.0.0.0:8002"]
