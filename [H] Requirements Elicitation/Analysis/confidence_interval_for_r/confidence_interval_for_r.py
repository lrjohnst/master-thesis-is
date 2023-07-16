import math

def calculate_confidence_interval(r, n):
    se = 1 / math.sqrt(n - 3)
    z = 1.96  # For a 95% confidence level
    tanh_value = math.tanh(math.atanh(r) + z * se)
    lower_bound = math.tanh(math.atanh(r) - z * se)
    upper_bound = math.tanh(math.atanh(r) + z * se)
    return lower_bound, upper_bound

# Example usage
r_value = 0.85
sample_size = 14

lower, upper = calculate_confidence_interval(r_value, sample_size)
print(f"95% Confidence Interval: [{lower}, {upper}]")
