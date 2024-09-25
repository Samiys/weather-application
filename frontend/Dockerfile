# Use an official Node.js image
FROM node:22.7-alpine

# Set the working directory inside the container
WORKDIR /app

# Copy the package.json and package-lock.json
COPY ./frontend/package*.json ./

# Install the Vue.js app dependencies
RUN npm install

# Copy the Vue.js project to the container
COPY ./frontend /app

# Build the Vue.js app
RUN npm run build

# Expose the port used by the vue server
EXPOSE 8080

# Start the Vite app
CMD ["npm", "run", "serve"]
