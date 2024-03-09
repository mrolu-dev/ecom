// Function to enable dark mode
function enableDarkMode() {
    // Add 'dark-mode' class to the body
    document.body.classList.add('dark-mode');
}

// Function to initialize dark mode based on the feature flag
function initializeDarkMode() {
    // Check if dark mode should be enabled based on the feature flag
    var isDarkModeEnabled = process.env.FEATURE_DARK_MODE === 'true';

    // If dark mode is enabled, apply the 'dark-mode' class to the body
    if (isDarkModeEnabled) {
        enableDarkMode();
    }
}

// Call initializeDarkMode to set up dark mode based on feature flag
initializeDarkMode();
