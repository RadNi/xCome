def get_components_by_name(driver, names):
    components = []
    for i in range(len(names)):
        temp = names[i].split("=")
        if len(temp) > 1:
            components.append(driver.find_element_by_id(temp[0]))
            components[i].send_keys(temp[1])
        else:
            components.append(driver.find_element_by_id(temp[0]))

    return components
