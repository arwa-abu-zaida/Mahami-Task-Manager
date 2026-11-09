# Technical Notes

## Biggest Docker problem and solution

The application needs PHP extensions for SQLite and a Laravel application key before it can start. The Docker image installs the `pdo_sqlite` extension, and the entrypoint script creates the `.env` file when needed, generates the application key, creates the SQLite file, and runs database migrations. This makes startup repeatable for a new developer.

The initial image build also needs an internet connection because Composer downloads Laravel and Livewire dependencies.

## Most important Git/GitHub lesson

Small, focused commits make project history easier to understand and review. Commit messages should describe the actual change, for example `docker: add container configuration` or `docs: document local startup steps`, instead of vague messages such as `update` or `final`.

## Implementation note

This repository keeps the assignment-specific Laravel files in `src/`. During the Docker build, the Dockerfile creates a fresh Laravel 12 skeleton, installs Livewire, and overlays the files from `src/`. The database is SQLite and is persisted in a named Docker volume.
