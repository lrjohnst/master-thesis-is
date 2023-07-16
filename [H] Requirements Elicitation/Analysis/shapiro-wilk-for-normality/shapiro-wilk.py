from scipy import stats
import csv

def shapiro_wilk_test(data):
    """
    Performs the Shapiro-Wilk test for normality on the given dataset.

    Parameters:
        data (array-like): The dataset to be tested for normality.

    Returns:
        (float, float): The test statistic and p-value.
    """
    test_statistic, p_value = stats.shapiro(data)
    return test_statistic, p_value

# Example usage
data = {
    's_behavior_more_speed': [1,2,3,3,2,3,3,1,1,1,2,4,1,2,2,1,1,2,1,2,1,1,2,2,2,1],
    's_behavior_less_speed': [3,1,4,2,1,4,3,3,1,2,2,4,3,2,4,4,1,2,3,3,1,3,4,4,3,3],
    's_behavior_speed_control': [2,2,4,2,1,4,1,2,1,1,2,4,1,2,1,2,1,2,1,2,2,2,4,2,4,1],
    's_behavior_lane_position': [2,3,3,3,2,4,2,2,2,2,2,4,2,3,3,2,2,3,2,3,2,1,3,4,4,2],
    's_behavior_reaction_time': [4,3,2,3,2,3,3,2,1,2,3,4,2,2,3,4,2,3,3,3,2,3,3,3,3,2],
    's_behavior_wrong_turns': [4,3,4,3,4,2,1,3,1,2,1,4,1,2,4,5,3,4,2,3,1,3,4,4,3,2],
    's_behavior_operating_errors': [2,1,3,3,2,2,3,1,1,1,2,1,2,2,3,2,1,1,2,2,1,2,3,2,2,2],
    'i_behavior_more_speed': [1,1,2,2,1,2,2,4,1,3,2,3,3,1],
    'i_behavior_less_speed': [2,2,2,2,3,4,3,3,2,3,2,3,3,2],
    'i_behavior_speed_control': [2,1,2,3,3,3,3,4,2,3,2,3,3,1],
    'i_behavior_lane_position': [2,2,2,3,3,3,3,3,1,3,3,2,1,2],
    'i_behavior_reaction_time': [3,2,2,2,3,3,3,2,1,3,3,2,2,2],
    'i_behavior_wrong_turns': [2,2,3,3,4,3,2,3,2,1,3,3,3,1],
    'i_behavior_operating_errors': [3,2,2,1,1,2,2,3,1,1,2,1,2,1],
    'z_behavior_more_speed': [2,1,1,2,2,2,1,2,1,1,1],
    'z_behavior_less_speed': [4,1,1,1,2,3,1,3,1,5,2],
    'z_behavior_speed_control': [4,2,1,1,2,2,1,3,2,1,3],
    'z_behavior_lane_position': [4,2,1,1,3,2,1,2,2,2,3],
    'z_behavior_reaction_time': [1,2,1,1,4,3,1,2,3,4,2],
    'z_behavior_wrong_turns': [2,1,1,1,4,1,3,3,2,1,3],
    'z_behavior_operating_errors': [3,1,1,1,3,1,1,2,1,1,2]
}

# Loop through the items in the data dictionary
# for key, values in data.items():
#     test_stat, p_value = shapiro_wilk_test(values)
#
#     # Format the numbers without scientific notation
#     test_stat_formatted = "{:.8f}".format(test_stat)
#     p_value_formatted = "{:.8f}".format(p_value)
#
#     print("dataset:", key)
#     print("Test statistic:", test_stat_formatted)
#     print("P-value:", p_value_formatted, "\n\n")


# Open a file in write mode and create a CSV writer
with open('output.csv', 'w', newline='') as file:
    writer = csv.writer(file)

    # Write the header row
    writer.writerow(['variable', 'W', 'p'])

    # Loop through the items in the data dictionary
    for key, values in data.items():
        test_stat, p_value = shapiro_wilk_test(values)

        # Format the numbers without scientific notation
        test_stat_formatted = "{:.8f}".format(test_stat)
        p_value_formatted = "{:.8f}".format(p_value)

        # Write the row to the CSV file
        writer.writerow([key, test_stat_formatted, p_value_formatted])