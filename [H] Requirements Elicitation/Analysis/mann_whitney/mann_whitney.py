from scipy.stats import mannwhitneyu

# Group Integrated Extended
ie_distraction_awareness = [1, 1, 1, 1, 1, 0, 1, 1, 2, 1, 1, 2, 0, 2, 2, 1, 0, 1, 0, 0, 1, 3, 1, 0, 2, 2, 4, 3, 1, 1]
ie_distraction_glance_duration = [1, 2, 0, 1, 1, 1, 2, 2, 1, 1, 0, 1, 1, 2, 2, 2, 1, 3, 1, 0, 0, 3, 1, 0, 0, 0, 3, 2, 1, 2]
ie_distraction_glance_frequency = [1, 1, 0, 1, 1, 0, 2, 2, 1, 1, 0, 1, 1, 1, 2, 1, 1, 3, 0, 0, 0, 2, 0, 0, 1, 2, 2, 2, 2, 1]
ie_distraction_manual = [1, 1, 0, 1, 0, 0, 1, 1, 2, 2, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 2, 0, 0, 1, 0, 2, 3, 2, 2]
ie_distraction_mental_load = [2, 1, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 2, 1, 1, 0, 1, 0, 0, 1, 3, 1, 0, 1, 0, 2, 0, 1, 1]
ie_distraction_shift_focus = [2, 1, 0, 1, 0, 1, 1, 2, 1, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 3, 1, 1, 1, 1, 2, 3, 2, 1]

# Group Nomadic Extended
ne_distraction_awareness = [3, 2, 2, 3, 2, 3, 2, 1, 1, 0, 1, 1, 2, 3, 0, 2, 2, 1, 1, 2, 1, 1, 1, 1, 2, 1, 3, 1, 1, 1]
ne_distraction_glance_duration = [2, 0, 1, 1, 1, 2, 3, 1, 2, 1, 0, 0, 1, 1, 1, 1, 2, 2, 1, 1, 2, 2, 1, 0, 1, 3, 1, 2, 1, 1]
ne_distraction_glance_frequency = [1, 2, 1, 1, 0, 2, 2, 1, 1, 0, 0, 1, 1, 1, 1, 1, 3, 1, 2, 2, 3, 1, 0, 0, 2, 1, 2, 1, 1, 1]
ne_distraction_manual = [1, 1, 0, 1, 0, 2, 2, 0, 1, 0, 0, 1, 1, 3, 0, 1, 1, 2, 0, 1, 2, 2, 0, 0, 2, 1, 2, 2, 1, 1]
ne_distraction_mental_load = [1, 1, 1, 2, 0, 2, 0, 1, 1, 0, 0, 0, 2, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, 2, 2, 1, 0, 1, 1]
ne_distraction_shift_focus = [1, 0, 1, 1, 0, 2, 2, 1, 1, 0, 0, 0, 1, 3, 0, 1, 2, 2, 2, 1, 1, 1, 1, 0, 3, 2, 1, 1, 1, 2]

# Group Integrated Small
is_distraction_awareness = [1, 1, 1, 1, 0, 1, 1, 2, 1, 1, 2, 0, 2, 2, 1, 0]
is_distraction_glance_duration = [2, 0, 1, 1, 1, 2, 2, 1, 1, 0, 1, 1, 2, 2, 2, 1]
is_distraction_glance_frequency = [1, 0, 1, 1, 0, 2, 2, 1, 1, 0, 1, 1, 1, 2, 1, 1]
is_distraction_manual = [1, 0, 1, 0, 0, 1, 1, 2, 2, 0, 1, 1, 0, 0, 1, 1]
is_distraction_mental_load = [1, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 2, 1, 1, 0]
is_distraction_shift_focus = [1, 0, 1, 0, 1, 1, 2, 1, 1, 0, 1, 0, 1, 1, 1, 1]

# Group Nomadic Small
ns_distraction_awareness = [3, 2, 2, 3, 2, 3, 2, 1, 1, 0, 1, 1, 2, 3, 0, 2, 2, 1, 1, 2, 1, 1, 1, 1, 2, 1, 3, 1]
ns_distraction_glance_duration = [2, 0, 1, 1, 1, 2, 3, 1, 2, 1, 0, 0, 1, 1, 1, 1, 2, 2, 1, 1, 2, 2, 1, 0, 1, 3, 1, 2]
ns_distraction_glance_frequency = [1, 2, 1, 1, 0, 2, 2, 1, 1, 0, 0, 1, 1, 1, 1, 1, 3, 1, 2, 2, 3, 1, 0, 0, 2, 1, 2, 1]
ns_distraction_manual = [1, 1, 0, 1, 0, 2, 2, 0, 1, 0, 0, 1, 1, 3, 0, 1, 1, 2, 0, 1, 2, 2, 0, 0, 2, 1, 2, 2]
ns_distraction_mental_load = [1, 1, 1, 2, 0, 2, 0, 1, 1, 0, 0, 0, 2, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, 2, 2, 1, 0]
ns_distraction_shift_focus = [1, 0, 1, 1, 0, 2, 2, 1, 1, 0, 0, 0, 1, 3, 0, 1, 2, 2, 2, 1, 1, 1, 1, 0, 3, 2, 1, 1]

variables = {
    "distraction_manual": {
        "small": [is_distraction_manual, ns_distraction_manual],
        "extended": [ie_distraction_manual, ne_distraction_manual],
    },
    "distraction_awareness": {
        "small": [is_distraction_awareness, ns_distraction_awareness],
        "extended": [ie_distraction_awareness, ne_distraction_awareness],
    },
    "distraction_shift_focus": {
        "small": [is_distraction_shift_focus, ns_distraction_shift_focus],
        "extended": [ie_distraction_shift_focus, ne_distraction_shift_focus],
    },
    "distraction_mental_load": {
        "small": [is_distraction_mental_load, ns_distraction_mental_load],
        "extended": [ie_distraction_mental_load, ne_distraction_mental_load],
    },
    "distraction_glance_frequency": {
        "small": [is_distraction_glance_frequency, ns_distraction_glance_frequency],
        "extended": [ie_distraction_glance_frequency, ne_distraction_glance_frequency],
    },
    "distraction_glance_duration": {
        "small": [is_distraction_glance_duration, ns_distraction_glance_duration],
        "extended": [ie_distraction_glance_duration, ne_distraction_glance_duration],
    },
}


# Perform Mann-Whitney U test for each pair of variables
for key, value in variables.items():
    if isinstance(value, dict):
        for sub_key, sub_value in value.items():
            if len(sub_value) == 2:  # Check if there are two groups to compare
                group1, group2 = sub_value
                statistic, p_value = mannwhitneyu(group1, group2)
                print(f"Mann-Whitney U statistic for {key} ({sub_key}):", statistic)
                print(f"P-value for {key} ({sub_key}):", p_value)
                print()  # Add a blank line for readability


# # Group Integrated Extended
# ie_groups = [ie_distraction_awareness, ie_distraction_glance_duration, ie_distraction_glance_frequency,
#              ie_distraction_manual, ie_distraction_mental_load, ie_distraction_shift_focus]
#
# # Group Nomadic Extended
# ne_groups = [ne_distraction_awareness, ne_distraction_glance_duration, ne_distraction_glance_frequency,
#              ne_distraction_manual, ne_distraction_mental_load, ne_distraction_shift_focus]
#
# # Group Integrated Small
# is_groups = [is_distraction_awareness, is_distraction_glance_duration, is_distraction_glance_frequency,
#              is_distraction_manual, is_distraction_mental_load, is_distraction_shift_focus]
#
# # Group Nomadic Small
# ns_groups = [ns_distraction_awareness, ns_distraction_glance_duration, ns_distraction_glance_frequency,
#              ns_distraction_manual, ns_distraction_mental_load, ns_distraction_shift_focus]

# Define the group labels
# group_labels = ["Integrated Extended", "Nomadic Extended", "Integrated Small", "Nomadic Small"]

# Perform Mann-Whitney U test and store the p-values in a matrix
# p_value_matrix = []
# for i in range(len(ie_groups)):
#     p_values = []
#     for j in range(len(ne_groups)):
#         statistic, p_value = mannwhitneyu(ie_groups[i], ne_groups[j])
#         p_values.append(p_value)
#     for j in range(len(is_groups)):
#         statistic, p_value = mannwhitneyu(ie_groups[i], is_groups[j])
#         p_values.append(p_value)
#     for j in range(len(ns_groups)):
#         statistic, p_value = mannwhitneyu(ie_groups[i], ns_groups[j])
#         p_values.append(p_value)
#     p_value_matrix.append(p_values)

# Print the p-value matrix
# for i in range(len(group_labels)):
#     for j in range(len(group_labels)):
#         print(f"Mann-Whitney U p-value for {group_labels[i]} vs {group_labels[j]}: {p_value_matrix[i][j]}")

# Perform Mann-Whitney U test
# statistic, p_value = mannwhitneyu(ns_distraction_awareness, is_distraction_awareness)

# Print the results
# print("Mann-Whitney U statistic:", statistic)
# print("P-value:", p_value)

