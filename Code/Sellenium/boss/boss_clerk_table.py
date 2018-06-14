import unittest

from selenium import webdriver

from test_utility import static_data


class Boss(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_boss_activate_clerk(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        users = driver.find_element_by_id("clerks-table").find_elements_by_tag_name('tr')
        for i in range(1, len(users), 2):
            users[i].find_element_by_class_name("checkbox").find_element_by_tag_name('input').click()

        driver.find_element_by_id("active-butt").click()

        assert driver.find_element_by_id("successful") is not None

    def test_boss_deactivate_clerks(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        users = driver.find_element_by_id("clerks-table").find_elements_by_tag_name('tr')
        for i in range(2, len(users), 2):
            users[i].find_element_by_class_name("checkbox").find_element_by_tag_name('input').click()

        driver.find_element_by_id("deactivate-butt").click()

        assert driver.find_element_by_id("successful") is not None

    def test_boss_delete_clerks(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        users = driver.find_element_by_id("clerks-table").find_elements_by_tag_name('tr')
        for i in range(1, len(users), 2):
            users[i].find_element_by_class_name("checkbox").find_element_by_tag_name('input').click()

        driver.find_element_by_id("remove-butt").click()

        assert driver.find_element_by_id("successful") is not None

    def tearDown(self):
        self.driver.close()
