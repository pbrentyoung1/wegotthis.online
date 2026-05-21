# Deployment

## Purpose

Document hosting, deployment, release, and environment direction.

## Current Decisions

- The project is expected to be hosted initially on a hosting.com reseller account.
- cPanel and SSH access are available.
- GitHub will be the source of truth.

## Open Questions

- What is the exact deployment process from GitHub to hosting.com?
- Does the hosting environment support the required PHP, Node, Composer, and PostgreSQL versions?
- How will environment variables, queues, jobs, and storage links be handled?

## Notes

- Deployment planning should happen before Laravel scaffolding if hosting constraints may affect setup.

Last updated: 2026-05-20
