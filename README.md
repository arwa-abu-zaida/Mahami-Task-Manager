# Mahami – Task Manager

A simple Arabic task management web application built with Laravel and Livewire. It uses a soft pink theme and the Tajawal Arabic typeface. Users can add, edit, delete, and complete tasks without full-page reloads.

## Tech stack

- PHP 8.3
- Laravel 12
- Livewire 3
- SQLite
- Docker and Docker Compose
- Tajawal font (Google Fonts)

## Run with Docker

Requirements: Docker Desktop (or Docker Engine) with the Compose plugin.

```bash
git clone YOUR_GITHUB_REPOSITORY_URL
cd Mahami-Task-Manager
docker compose up --build -d
```

Open **http://localhost:8000**.

The first build downloads the Laravel and Composer dependencies, so it requires an internet connection and may take a few minutes. Docker Compose creates persistent volumes for the SQLite database and Laravel storage.

## Test the application

1. Open `http://localhost:8000`.
2. Add a task with a title and optional description.
3. Edit the task, then save the changes.
4. Mark it complete using the checkbox.
5. Delete the task.
6. Check the health endpoint at `http://localhost:8000/health`; it should return JSON with `"status": "ok"`.

## Useful commands

```bash
docker compose ps          # show container status
docker compose logs -f     # follow application logs
docker compose down        # stop and remove the container
docker compose down -v     # stop and remove container and persistent data
```

If GNU Make is installed, shortcuts are available:

```bash
make build
make run
make status
make logs
make stop
make clean
```

## Configuration

| Setting | Value |
|---|---|
| Web port | `8000` |
| Database | SQLite |
| Database path | `database/database.sqlite` |
| Health endpoint | `/health` |

No external database service or manually-created `.env` file is required for the Docker setup. Do not expose `APP_DEBUG=true` in a public deployment.

## Project structure

- `src/` contains the Laravel application files added for Mahami. The Dockerfile creates the Laravel 12 skeleton and installs Livewire, then copies this source overlay into it.
- `docker/entrypoint.sh` prepares the application key and database migrations at container startup.
- `docs/screenshots/` is reserved for assignment evidence.
- `.github/workflows/docker.yml` builds the Docker image on pushes and pull requests.

## Notes

See [`docs/notes.md`](docs/notes.md) for technical notes and lessons learned.

## Attribution

Mahami's task-management code and interface in this repository are written for this assignment. The Docker build uses the official Laravel application skeleton and the Livewire package, installed through Composer. Laravel and Livewire retain their respective licenses and copyrights.
