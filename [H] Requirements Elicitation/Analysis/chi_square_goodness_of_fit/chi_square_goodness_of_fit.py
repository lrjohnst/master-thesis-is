import numpy as np
from scipy.stats import chi2_contingency

# Define the observed frequencies (excluding the "Total set" row)
observed = np.array([
    [24, 14, 2, 0],
    [30, 15, 7, 1],
    [32, 11, 4, 0],
    [27, 8, 1, 0],
    [30, 15, 3, 0],
    [29, 16, 5, 0]
])

# Perform the Chi-Square Goodness-of-Fit test
chi2, p_value, dof, expected = chi2_contingency(observed)

# Output the test results
print("Chi-Square Goodness-of-Fit Test")
print("Chi-Square Statistic:", chi2)
print("Degrees of Freedom:", dof)
print("P-value:", p_value)
print("Expected Frequencies:")
print(expected)
